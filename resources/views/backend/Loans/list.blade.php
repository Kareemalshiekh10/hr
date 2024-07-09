@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div style="background-color: #cecece" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Loans</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">List</a></li>
                            <li class="breadcrumb-item active">Loans</li>
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
                            <label>Loan ID</label>
                            <input type="text" value="{{ old('id') }}" name="id" class="form-control"  placeholder="Enter Loan ID"> 
                        </div>  
                        <div class="form-group col-md-3">
                            <label>Employee Name</label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control"  placeholder="Enter Employee Name"> 
                        </div>  
                        <div class="form-group col-md-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="">All</option>
                                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-2">
                            <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                            <a href="{{ url('admin/Loans') }}" class="btn btn-success"
                                style="margin-top: 30px;">Reset</a>
                        </div>


                    </div>
                </div>
            </form>

            <!-- /.search-section -->


     
            <div class="container1">
                @include('_message')
                <h2>Loans</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee name</th>
                       {{--      <th>Department name</th> --}}
                            <th>Amount</th>
                            <th>Date Requested</th>
                            <th>Status</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($getRecord as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ !empty($value->get_user_name_single->name)? $value->get_user_name_single->name:''}}</td>
                               {{--  <td>{{ !empty($value->get_department_name_single->name)? $value->get_department_name_single ->name:''}}</td> --}}
                                <td>{{ $value->amount }}</td>
                                <td>{{ $value->date_requested }}</td>
                                <td>{{ $value->status }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>{{ $value->updated_at }}</td>
                                <td>
                             
                                    <a href="{{ url('admin/Loans/delete/'.$value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                    <a href="{{ url('admin/Loans/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                               
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No Record found.</td>
                            </tr>
                        @endforelse <!-- Add this line -->
                    </tbody>
                </table>
               {{--  <div style="padding: 10px; float: right;">
                    {!! $records->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div> --}}
            </div>
        </section>
        <br>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection