@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div style="background-color: #cecece" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Branches</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Branches</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
            <form class="form-horizontal" method="post" action="{{ url('admin/Branches/edit/' . $getRecord->id) }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <h2>Edit Branches</h2>
                <div class="row gy-1 h-100">
                    <div class="col-6">
                        <label class="form-label">Branch Name</label>
                        <input type="text" value="{{ $getRecord->name }}" name="name" class="form-control" required>
                    </div>
                    
                    <div class="col-6">
                        <label class="form-label">Address<span style="color:red;">*</span></label>
                        <input type="text" value="{{ $getRecord->address}}" name="address"
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
