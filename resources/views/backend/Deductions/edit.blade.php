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
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Deductions</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
            <form class="form-horizontal" method="post" action="{{ url('admin/Deductions/edit/' . $getRecord->id) }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <h2>Edit Deduction</h2>
                <div class="row gy-1 h-100">
                    <div class="col-6">
                        <label class="form-label">Employees Name<span style="color:red;">*</span></label>

                        <select class="form-control" name="employee_id">
                            <option value="">Select Employees Name</option>
                            @foreach ($getEmployees as $value_employee)
                                <option {{ $value_employee->id == $getRecord->employee_id ? 'selected' : '' }}
                                    value="{{ $value_employee->id }}">{{ $value_employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Amount</label>
                        <input type="number" value="{{ $getRecord->amount }}" name="amount" class="form-control" required>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Salary After Deducation<span style="color:red;">*</span></label>
                        <input type="text" value="{{ $getRecord->salary_after_deducation }}" name="salary_after_deducation"
                            class="form-control" required>
                    </div>
                    
                    <div class="col-6">
                        <label class="form-label">reason<span style="color:red;">*</span></label>
                        <input type="text" value="{{ $getRecord->reason	}}" name="reason"
                            class="form-control" required>
                    </div>
                    <br>
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>

            </form>
        </section>






        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
