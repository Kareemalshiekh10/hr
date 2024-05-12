@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div style="background-color: #cecece" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Loans</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Loans</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
            <form class="form" method="post" action="{{ url('admin/Loans/add') }}" enctype="multipart/form-data">
                @csrf
                <h2>Add Loan</h2>
                <div class="row gy-1 h-100">
                    <div class="col-6">
                        <label class="form-label">Employee Name <span style="color:red;">*</span></label>
                       <select class="form-control" name= "employee_id">
                            <option value="">Select Employee</option>
                            @foreach($getEmployees as $value_employee)
                            <option value="{{ $value_employee->id }}">{{ $value_employee->name }}</option>
                            @endforeach
                       </select>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Department Name <span style="color:red;">*</span></label>
                        <select class="form-control" name= "department_id">
                            <option value="">Select Department</option>
                            @foreach($getDepartment as $value_department)
                            <option value="{{ $value_department->id }}">{{ $value_department->name }}</option>
                            @endforeach
                       </select>
                    </div>


                    <div class="col-6">
                        <label class="form-label">amount</label>
                        <input type="text" value="{{ old('amount') }}" id="amount"
                            name="amount" class="form-control" placeholder="e.g..3200"
                            aria-label="amount">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Date requested </label>
                        <input type="date" value="{{ old('date_requested') }}" id="date_requested"
                            name="date_requested" class="form-control" placeholder="DD/MM/YYYY" aria-label="date_requested">
                    </div>

                    <div class="col-6">
                        <label class="form-label" for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>

                    </div>

                    <br></br>
                    <br></br>
                </div>
                <input type="submit" value="Add Loan" class="btn btn-primary">
            </form>
        </section>

        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
