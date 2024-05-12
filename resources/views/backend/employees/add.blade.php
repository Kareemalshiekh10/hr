@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div style="background-color: #cecece" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employees</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Employees</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
<!-- Inside add.blade.php -->
            <form class="form" method="post" action="{{ url('admin/employees/add') }}" enctype="multipart/form-data">

                {{ csrf_field() }}
                <h2>Add Employee</h2>
                <div class="row gy-1 h-100">
                    <div class="col-6">
                        <label class="form-label">Employee Name <span style="color:red;">*</span> </label>
                        <input type="text" value="{{ old('name') }}" id="employeeName" name="name" class="form-control"
                            placeholder="e.g., John Doe" aria-label="employeeName" required>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Employee Email <span style="color:red;">*</span></label>
                        <input type="email" value="{{ old('email') }}" id="employeeEmail" name="email" class="form-control"
                            placeholder="e.g., ABC@example.com" aria-label="employeeEmail" required>
                            <span style="color:red">{{ $errors->first('email') }}</span>
                    </div>


                    <div class="col-6">
                        <label class="form-label">Phone Number</label>
                        <input type="number" value="{{ old('Phone') }}" id="employeePhone" name="Phone" class="form-control"
                            placeholder="e.g., (555) 123-4567" aria-label="employeePhone">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Department <span style="color:red;">*</span></label>
                        <select class="form-select" id="Department" name="Department" aria-label="Department" required>
                            <option selected>Choose Department...</option>
                            @foreach($getDepartments as $value_d)
                            <option value="{{ $value_d->id }}">{{ $value_d->name }}</option>
                            @endforeach
                        </select>
                        
                    </div>

                    <div class="col-6">
                        <label class="form-label">Position <span style="color:red;">*</span></label>
                        <input type="text" value="{{ old('Position') }}" id="employeePosition" name="Position" class="form-control"
                            placeholder="e.g., Manager" aria-label="employeePosition" required>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Joining Date <span style="color:red;">*</span></label>
                        <input type="date" value="{{ old('Joining_Date') }}"  id="employeeJoiningDate" name="Joining_Date" class="form-control"
                            placeholder="YYYY-MM-DD" aria-label="employeeJoiningDate" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Salary <span style="color:red;">*</span></label>
                            <input type="number" value="{{ old('Salary') }}"  id="employeeSalary" name="Salary" class="form-control"
                                placeholder="e.g., 80000" aria-label="employeeSalary" required>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Profile Image</label>
                            <input type="file"  id="profile_image" name="profile_image" class="form-control"
                                 aria-label="profile_image" >
                    </div>
                    
                    
                    <br>
                    <input type="submit" value="Add Employee" class="btn btn-primary">
                </div>

            </form>
        </section>






        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
