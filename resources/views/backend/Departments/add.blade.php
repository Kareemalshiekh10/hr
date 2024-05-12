@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div style="background-color: #cecece" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Departments</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Departments</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
            <form class="form" method="post" action="{{ url('admin/Departments/add') }}" enctype="multipart/form-data">
                @csrf
                <h2>Add Department</h2>
                <div class="row gy-1 h-100">
                    <div class="col-6">
                        <label class="form-label">Department Name <span style="color:red;">*</span></label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" required placeholder="Enter Department Name">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Department head <span style="color:red;">*</span></label>
                        <input type="text" value="{{ old('head') }}" id="head	" name="head" class="form-control"
                            placeholder="e.g., John fars" aria-label="head	" required>
                        {{-- <span style="color:red">{{ $errors->first('head') }}</span> --}}
                    </div>


                    <div class="col-6">
                        <label class="form-label">Department description </label>
                        <input type="text" value="{{ old('Dep_description') }}" id="Dep_description"
                            name="Dep_description" class="form-control" placeholder="description"
                            aria-label="Dep_description">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Employees Count </label>
                        <input type="number" value="{{ old('Employees_Count') }}" id="Employees_Count"
                            name="Employees_Count" class="form-control" placeholder="e.g., 23" aria-label="Employees_Count">
                    </div>

                    <br>
                </div>
                <input type="submit" value="Add Department" class="btn btn-primary">
            </form>
        </section>

        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
