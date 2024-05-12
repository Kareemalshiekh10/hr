@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div style="background-color: #cecece" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Department Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">View</a></li>
                            <li class="breadcrumb-item active">Department Details</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- .content -->
       {{--  <section style="margin-left: -200px" class="content"> --}}
            <div class="container">
                <!-- Your Department view table or content here -->
                <!-- Example Table -->
                <table style="width: 100%; border-collapse: collapse; margin-top: 20px;" class="view-table">
                    <tbody>
                        <tr>
                            <th style="width: 15%;">ID</th>
                            <td>{{ $getRecord->id }}</td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Department Name</th>
                            <td>{{ $getRecord->name }}</td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Department Description</th>
                            <td>{{ $getRecord->Dep_description }}</td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Department head</th>
                            <td>{{ $getRecord->head }}</td>
                        </tr>

                        <tr>
                            <th style="width: 15%;">Employees Count</th>
                            <td>{{ $getRecord->Employees_Count }}</td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">created at</th>
                            <td>{{ $getRecord->created_at }}</td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">updated at</th>
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
