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
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Branches</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
            <form class="form" method="post" action="{{ url('admin/Branches/add') }}" enctype="multipart/form-data">
                @csrf
                <h2>Add Branch</h2>
                <div class="row gy-1 h-100">
                    <div class="col-6">
                        <label class="form-label">Branch Name</label>
                        <input type="text" value="{{ old('name') }}" id="name"
                            name="name" class="form-control" placeholder=""
                            aria-label="name">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Address</label>
                        <input type="text" value="{{ old('address') }}" id="address"
                            name="address" class="form-control" placeholder=""
                            aria-label="address">
                    </div>


                    <br></br>
                    <br></br>
                </div>
                <input type="submit" value="Add Branch" class="btn btn-primary">
            </form>
        </section>

        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
