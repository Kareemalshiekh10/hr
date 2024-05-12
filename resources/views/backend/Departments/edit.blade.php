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
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Departments</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
            <form class="form-horizontal" method="post" action="{{ url('admin/Departments/edit/'.$getRecord->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h2>Edit Department</h2>
                <div class="row gy-1 h-100">
                    <div class="col-6">
                        <label class="form-label">Department Name<span style="color:red;">*</span></label>
                        <input type="text" value="{{ $getRecord->name }}" name="name" class="form-control" required placeholder="Enter Department Name">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Department head<span style="color:red;">*</span></label>
                        <input type="text" value="{{ $getRecord->head }}" id="head" name="head" class="form-control"
                            placeholder="e.g., John fars" aria-label="head" required>
                    </div>


                    <div class="col-6">
                        <label class="form-label">Department description</label>
                        <input type="text" value="{{ $getRecord->Dep_description }}" id="Dep_description"
                            name="Dep_description" class="form-control" placeholder="description"
                            aria-label="Dep_description">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Employees Count <span style="color:red;">*</span></label>
                        <input type="number" value="{{ $getRecord->Employees_Count }}" id="Employees_Count" name="Employees_Count"
                            class="form-control" placeholder="e.g., 34" aria-label="Employees_Count" required>
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
