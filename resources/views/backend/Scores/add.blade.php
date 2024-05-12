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
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Scores</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
            <form class="form" method="post" action="{{ url('admin/Scores/add') }}" enctype="multipart/form-data">
                @csrf
                <h2>Add Score</h2>
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
                        <label class="form-label">Work Life Balance</label>
                        <input type="number" value="{{ old('work_life_balance') }}" id="work_life_balance"
                            name="work_life_balance" class="form-control" placeholder=""
                            aria-label="work_life_balance">
                    </div>

                    <div class="col-6">
                        <label class="form-label">skill_development</label>
                        <input type="number" value="{{ old('skill_development') }}" id="skill_development"
                            name="skill_development" class="form-control" placeholder="" >
                    </div>


                    <div class="col-6">
                        <label class="form-label">salary_and_benefits</label>
                        <input type="number" value="{{ old('salary_and_benefits') }}" id="salary_and_benefits"
                            name="salary_and_benefits" class="form-control" placeholder="Scores for salary and benefits..." >
                    </div>


                    <div class="col-6">
                        <label class="form-label">job_security</label>
                        <input type="number" value="{{ old('job_security') }}" id="job_security"
                            name="job_security" class="form-control" placeholder="Scores for job security..." >
                    </div>

                    <div class="col-6">
                        <label class="form-label">career_growth</label>
                        <input type="number" value="{{ old('career_growth') }}" id="career_growth"
                            name="career_growth" class="form-control" placeholder="Scores for career_growth..." >
                    </div>

                    <div class="col-6">
                        <label class="form-label">work_satisfaction</label>
                        <input type="number" value="{{ old('work_satisfaction') }}" id="work_satisfaction"
                            name="work_satisfaction" class="form-control" placeholder="Scores for work_satisfaction...">
                    </div>

              {{--       <div class="col-6">
                        <label class="form-label">Overall_rating</label>
                        <input type="number" value="{{ old('Overall_rating') }}" id="Overall_rating"
                            name="Overall_rating" class="form-control" placeholder="Scores for Overall_rating..." >
                    </div>
 --}}
                    <br></br>
                    <br></br>
                </div>
                <input type="submit" value="Add Scores" class="btn btn-primary">
            </form>
        </section>

        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
