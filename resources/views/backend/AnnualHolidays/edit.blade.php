@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div style="background-color: #cecece" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Annual Holidays</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Annual Holidays</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
            <form class="form-horizontal" method="post" action="{{ url('admin/AnnualHolidays/edit/' . $getRecord->id) }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <h2>Edit Annual Holiday</h2>
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
                        <label class="form-label">Holiday Date</label>
                        <input type="date" value="{{ $getRecord->holiday_date }}" name="holiday_date" class="form-control" required>
                    </div>
                    
                    <div class="col-6">
                        <label class="form-label">Description<span style="color:red;">*</span></label>
                        <input type="text" value="{{ $getRecord->description	}}" name="description"
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
