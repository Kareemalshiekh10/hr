@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div style="background-color: #cecece" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employee Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">View</a></li>
                            <li class="breadcrumb-item active">Employee Details</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- .content -->
       {{--  <section style="margin-left: -200px" class="content"> --}}
            <div class="container">
                <!-- Your employee view table or content here -->
                <!-- Example Table -->
                <table style="width: 100%; border-collapse: collapse; margin-top: 20px;" class="view-table">
                    <tbody>
                        <tr>
                            <th style="width: 15%;">ID</th>
                            <td>{{ $getRecord->id }}</td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Name</th>
                            <td>{{ $getRecord->name }}</td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Email</th>
                            <td>{{ $getRecord->email }}</td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Profile Image</th>
                            <td>
                                @if (!empty($getRecord->profile_image))
                                    @if (file_exists('upload/' . $getRecord->profile_image))
                                        <img src="{{ url('upload/' . $getRecord->profile_image) }}"
                                            style="width: 50 px; height: 50px;">
                                    @endif
                                @endif
                            </td>
                        <tr>
                            <th style="width: 15%;">Department</th>
                            <td>{{ $getRecord->Department }}</td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Position</th>
                            <td>{{ $getRecord->Position }}</td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Phone</th>
                            <td>{{ $getRecord->Phone }}</td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Salary</th>
                            <td>{{ $getRecord->Salary }}</td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Joining_Date</th>
                            <td>{{ $getRecord->Joining_Date }}</td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Role</th>
                            <td>{{ $getRecord->is_role }}</td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Created_at</th>
                            <td>{{ $getRecord->created_at }}</td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Updated_at</th>
                            <td>{{ $getRecord->updated_at }}</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
       {{--  </section> --}}
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Inline style to disable hover effect -->
    <style>
        tbody tr {
            background-color: white !important; /* Remove hover effect */
        }
    </style>
@endsection
