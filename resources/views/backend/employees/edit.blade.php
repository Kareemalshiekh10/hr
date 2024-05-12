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
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Employees</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
            <form class="form" id="AddEmployeeForm" method="post" action="{{ url('admin/Employees/edit/'.$getRecord->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h2>Edit Employee</h2>
                <div class="row gy-1 h-100">
                    <div class="col-6">
                        <label class="form-label">Employee Name <span style="color:red;">*</span> </label>
                        <input type="text" value="{{ $getRecord->name }}" id="employeeName" name="name" class="form-control"
                            placeholder="e.g., John Doe" aria-label="employeeName" required>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Employee Email <span style="color:red;">*</span></label>
                        <input type="email" value="{{ $getRecord->email }}" id="employeeEmail" name="email" class="form-control"
                            placeholder="e.g., ABC@example.com" aria-label="employeeEmail" required>
                            <span style="color:red">{{ $errors->first('email') }}</span>
                    </div>


                    <div class="col-6">
                        <label class="form-label">Phone Number</label>
                        <input type="number" value="{{ $getRecord->Phone }}" id="employeePhone" name="Phone" class="form-control"
                            placeholder="e.g., (555) 123-4567" aria-label="employeePhone">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Profile Image</label>
                        <input type="file" id="profile_image" name="profile_image" class="form-control">
                        @if (!empty($getRecord->profile_image))
                        @if (file_exists('upload/' . $getRecord->profile_image))
                         <img src="{{ url('upload/' . $getRecord->profile_image) }}"
                         style="width: 50 px; height: 50px;">
                         @endif
                     @endif
                    </div>

                    <div class="col-6">
                        <label class="form-label">Department <span style="color:red;">*</span></label>        
                        <select class="form-select"  value="{{ $getRecord->Department }}" id="Department" name="Department" aria-label="Department" required>
                            <option value="">Select Department Name</option>
                            @foreach($getDepartments as $value_d)
                             <option {{ ($value_d->id == $getRecord->id) ? 'selected' : '' }} value="{{ $value_d->id }}">{{ $value_d->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Position <span style="color:red;">*</span></label>
                        <input type="text" value="{{ $getRecord->Position }}" id="employeePosition" name="Position" class="form-control"
                            placeholder="e.g., Manager" aria-label="employeePosition" required>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Joining Date <span style="color:red;">*</span></label>
                        <input type="date" value="{{ $getRecord->Joining_Date }}"  id="employeeJoiningDate" name="Joining_Date" class="form-control"
                            placeholder="YYYY-MM-DD" aria-label="employeeJoiningDate" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Salary <span style="color:red;">*</span></label>
                            <input type="number" value="{{ $getRecord->Salary }}"  id="employeeSalary" name="Salary" class="form-control"
                                placeholder="e.g., 80000" aria-label="employeeSalary" required>
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
