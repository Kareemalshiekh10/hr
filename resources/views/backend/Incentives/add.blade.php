@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div style="background-color: #cecece" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Incentives</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Incentives</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
            <form class="form" method="post" action="{{ url('admin/Incentives/add') }}" enctype="multipart/form-data">
                @csrf
                <h2>Add Incentive</h2>
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
                        <label class="form-label">amount</label>
                        <input type="number" value="{{ old('amount') }}" id="amount"
                            name="amount" class="form-control" placeholder="e.g..3200"
                            aria-label="amount">
                    </div>

                    <div class="col-6">
                        <label class="form-label">description</label>
                        <input type="text" value="{{ old('description') }}" id="description"
                            name="description" class="form-control" placeholder="Incentive details.." aria-label="description">
                    </div>


                    <br></br>
                    <br></br>
                </div>
                <input type="submit" value="Add Incentive" class="btn btn-primary">
            </form>
        </section>

        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
