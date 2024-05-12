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
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Loans</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
            <form class="form-horizontal" method="post" action="{{ url('admin/Loans/edit/' . $getRecord->id) }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <h2>Edit Loans</h2>
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
                        <label class="form-label">Department head<span style="color:red;">*</span></label>
                        <select class="form-control" name="department_id">
                            <option value="">Select Department Name</option>
                            @foreach ($getDepartment as $value_department)
                                <option {{ $value_department->id == $getRecord->employee_id ? 'selected' : '' }}
                                    value="{{ $value_department->id }}">{{ $value_department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Amount</label>
                        <input type="number" value="{{ $getRecord->amount }}" name="amount" class="form-control" required>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Date Requested<span style="color:red;">*</span></label>
                        <input type="date" value="{{ $getRecord->date_requested }}" name="date_requested"
                            class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="pending" {{ $getRecord->status == 'pending' ? 'selected' : '' }}>Pending
                            </option>
                            <option value="approved" {{ $getRecord->status == 'approved' ? 'selected' : '' }}>Approved
                            </option>
                            <option value="rejected" {{ $getRecord->status == 'rejected' ? 'selected' : '' }}>Rejected
                            </option>
                        </select>
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
