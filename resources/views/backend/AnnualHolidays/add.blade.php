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
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Annual Holidays</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
            <form class="form" method="post" action="{{ url('admin/AnnualHolidays/add') }}" enctype="multipart/form-data">
                @csrf
                <h2>Add Annual Holiday</h2>
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
                        <label class="form-label">Holiday Date</label>
                        <input type="date" value="{{ old('holiday_date') }}" id="holiday_date"
                            name="holiday_date" class="form-control" placeholder=""
                            aria-label="holiday_date">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Description</label>
                        <input type="text" value="{{ old('description') }}" id="description"
                            name="description" class="form-control" placeholder="Annual Holidays Description..." aria-label="description">
                    </div>


                    <br></br>
                    <br></br>
                </div>
                <input type="submit" value="Add Annual Holiday" class="btn btn-primary">
            </form>
        </section>

        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
