@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div style="background-color: #cecece" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Scores</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">List</a></li>
                            <li class="breadcrumb-item active">Scores</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- .content -->
        
        <!-- .content -->
        
        <section style="margin-left: -200px" class="content">
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Employee Name</label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control"  placeholder="Enter Employee Name"> 
                        </div>  
                        
                        <div class="form-group col-md-2">
                            <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                            <a href="{{ url('admin/Scores') }}" class="btn btn-success"
                                style="margin-top: 30px;">Reset</a>
                        </div>


                    </div>
                </div>
            </form>

            <!-- /.search-section -->


     
            <div class="container1">
                @include('_message')
                <h2>Scores</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Employee name</th>
                            <th>Work Life Balance</th>
                            <th>Skill Development</th>
                            <th>Salary and Benefits</th>
                            <th>Job Security</th>
                            <th>Career Growth</th>
                            <th>Work Satisfaction</th>
                            <th>Overall Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($getRecord as $value)
                            <tr>
                                <td>{{ !empty($value->get_user_name_single->name)? $value->get_user_name_single->name:''}}</td>
                                <td>{{ $value->work_life_balance }}</td>
                                <td>{{ $value->skill_development }}</td>
                                <td>{{ $value->salary_and_benefits }}</td>
                                <td>{{ $value->job_security }}</td>
                                <td>{{ $value->career_growth }}</td>
                                <td>{{ $value->work_satisfaction }}</td>
                                <td>{{ $value->Overall_rating }}</td>
                                <td>
                                    <a href="{{ url('admin/Scores/delete/'.$value->employee_id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                    <a href="{{ url('admin/Scores/edit/'.$value->employee_id) }}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No Record found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
        <br>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
