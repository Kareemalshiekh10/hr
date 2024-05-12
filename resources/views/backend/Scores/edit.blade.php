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
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Scores</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- .content -->
        <section style="margin-left: -200px" class="content">
            <form class="form-horizontal" method="post" action="{{ url('admin/Scores/edit/' . $getRecord->employee_id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h2>Edit Score</h2>
                <div class="row gy-1 h-100">
                    <div class="col-6">
                        <label class="form-label">Employees Name<span style="color:red;">*</span></label>

                        <select class="form-control" name="employee_id">
                            <option value="">Select Employees Name</option>
                            @foreach ($getEmployees as $value_employee)
                                <option {{ $value_employee->id == $getRecord->employee_id ? 'selected' : '' }}
                                    value="{{ $value_employee->id }}">{{ $value_employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label">work_life_balance</label>
                        <input type="number" value="{{ $getRecord->work_life_balance }}" name="work_life_balance" class="form-control" required>
                    </div>


                    <div class="col-6">
                        <label class="form-label">skill_development</label>
                        <input type="number" value="{{ $getRecord->skill_development }}" name="skill_development" class="form-control" required>
                    </div>

                    <div class="col-6">
                        <label class="form-label">salary_and_benefits</label>
                        <input type="number" value="{{ $getRecord->salary_and_benefits }}" name="salary_and_benefits" class="form-control" required>
                    </div>

                    <div class="col-6">
                        <label class="form-label">job_security</label>
                        <input type="number" value="{{ $getRecord->job_security }}" name="job_security" class="form-control" required>
                    </div>

                    <div class="col-6">
                        <label class="form-label">career_growth</label>
                        <input type="number" value="{{ $getRecord->career_growth }}" name="career_growth" class="form-control" required>
                    </div>

                    <div class="col-6">
                        <label class="form-label">work_satisfaction</label>
                        <input type="number" value="{{ $getRecord->work_satisfaction }}" name="work_satisfaction" class="form-control" required>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Overall_rating</label>
                        <input type="number" value="{{ $getRecord->overall_rating }}" name="overall_rating" class="form-control" required>
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
