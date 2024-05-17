@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div style="background-color: #cecece" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Deductions</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Deductions</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
            <form class="form" method="post" action="{{ url('admin/Deductions/add') }}" enctype="multipart/form-data">
                @csrf
                <h2>Add Deduction</h2>
                <div class="row gy-1 h-100">
                    <div class="col-6">
                        <label class="form-label">Employee Name <span style="color:red;">*</span></label>
                        <select class="form-control" name="employee_id" id="employee_id" onchange="updateSalaryAfterDeduction()">
                            <option value="">Select Employee</option>
                            @foreach($getEmployees as $value_employee)
                                <option value="{{ $value_employee->id }}" data-salary="{{ $value_employee->Salary }}">{{ $value_employee->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Amount</label>
                        <input type="number" value="{{ old('amount') }}" id="amount" name="amount" class="form-control" placeholder="e.g..3200" aria-label="amount" oninput="updateSalaryAfterDeduction()">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Salary After Deduction</label>
                        <input type="number" value="{{ old('salary_after_deducation') }}" id="salary_after_deducation" name="salary_after_deducation" class="form-control" placeholder="e.g..400" aria-label="salary_after_deduction" readonly>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Reason</label>
                        <input type="text" value="{{ old('reason') }}" id="reason" name="reason" class="form-control" placeholder="deduction reason..." aria-label="reason">
                    </div>

                    <br></br>
                    <br></br>
                </div>
                <input type="submit" value="Add Deduction" class="btn btn-primary">
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script>
        function updateSalaryAfterDeduction() {
            var employeeSelect = document.getElementById('employee_id');
            var selectedEmployee = employeeSelect.options[employeeSelect.selectedIndex];
            var salary = parseFloat(selectedEmployee.getAttribute('data-salary'));
            var deductionAmount = parseFloat(document.getElementById('amount').value);

            if (!isNaN(salary) && !isNaN(deductionAmount)) {
                document.getElementById('salary_after_deducation').value = salary - deductionAmount;
            } else {
                document.getElementById('salary_after_deducation').value = '';
            }
        }
    </script>
@endsection
