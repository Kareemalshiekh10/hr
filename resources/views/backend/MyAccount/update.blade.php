@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div style="background-color: #cecece" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">My Account</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Setting</a></li>
                            <li class="breadcrumb-item active">My Account</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
           
            <form class="form" method="post" action="{{ url('admin/my_account/update') }}" enctype="multipart/form-data">
                @include('_message')
                @csrf
                <h2>My Account</h2>
                <div class="row gy-1 h-100">
                    <div class="col-6">
                        <label class="form-label">Name</label>
                        <input type="text" value="{{ $getRecord->name }}" id="name"
                            name="name" class="form-control" placeholder="e.g..Alex"
                            aria-label="name" required>
                            <span style="color: red;">{{ $errors->first('name') }}</span>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Email</label>
                        <input type="email" value="{{ $getRecord->email }}" id="email"
                            name="email" class="form-control" placeholder="e.g..ABC@example.com"
                            aria-label="email" required>
                            <span style="color: red;">{{ $errors->first('email') }}</span>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Profile Image</label>
                        <input type="file" {{-- value="{{ $getRecord->profile_image }}"  --}} id="profile_image"
                            name="profile_image" class="form-control" >
                            @if (!empty($getRecord->profile_image))
                            @if (file_exists('upload/' . $getRecord->profile_image))
                            <img src="{{ url('upload/' . $getRecord->profile_image) }}"
                            style="width: 50 px; height: 50px;">
                            @endif
                            @endif
                           
                    </div>

                    <div class="col-6">
                        <label class="form-label">Password</label>
                        (Leave blank if you don't want to change password)
                        <input type="text"  id="password"
                            name="password" class="form-control" placeholder="Enter New Password" aria-label="password">
                           
                    </div>


                    <br></br>
                    <br></br>
                </div>
                <input type="submit" value="Update" class="btn btn-primary">
            </form>
        </section>

        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
