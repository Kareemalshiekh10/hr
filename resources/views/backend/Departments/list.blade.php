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
                            <li class="breadcrumb-item"><a href="#">List</a></li>
                            <li class="breadcrumb-item active">Departments</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- .content -->
        
        <section style="margin-left: -200px" class="content">
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-1">
                            <label>ID</label>
                            <input type="text" name="id" class="form-control" value="{{ Request()->id }}"
                                placeholder="Dep ID">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Department Name</label>
                            <input type="text" value="{{ Request()->name }}" name="name" class="form-control"
                                placeholder="Department Name">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Department head</label>
                            <input type="number" value="{{ Request()->head }}" name="head" class="form-control"
                                placeholder="Department head">
                        </div>

                   

                        <div class="form-group col-md-2">
                            <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                            <a href="{{ url('admin/Departments') }}" class="btn btn-success"
                                style="margin-top: 30px;">Reset</a>
                        </div>
                        

                    </div>
                </div>
            </form>

            <!-- /.search-section -->

            <div class="container1">
                @include('_message')
                <h2>Departments</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Department</th>
                            <th>Description</th>   
                            <th>head</th>
                            <th>Employees_Count</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>                  
                        @forelse($getRecord as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->Dep_description }}</td>
                                <td>{{ $value->head }}</td>
                                <td>{{ $value->Employees_Count }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>{{ $value->updated_at }}</td>
                                <td>

                                    <a href="{{ url('admin/Departments/delete/'.$value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                    <a href="{{ url('admin/Departments/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('admin/Departments/view/'.$value->id) }}" class="btn btn-Secondary">view</a>

{{--                                     <a href="{{ url('admin/Departments/delete/' . $value->id) }}">
                                    <button onclick="return confirm('Are you sure you want to delete?')">
                                        <i class="fas fa-trash-alt"></i> <!-- Delete icon -->
                                    </button>
                                    </a>

                                    <a href="{{ url('admin/Departments/edit/' . $value->id) }}">
                                    <button onclick="editDepartment(1)">
                                        <i class="fas fa-edit"></i> <!-- Edit icon -->
                                    </button>
                                    </a>

                                    <a href="{{ url('admin/Departments/view/' . $value->id) }}">
                                        <button onclick="infoDepartment(1)">
                                            <i class="fas fa-info"></i> <!-- Info icon -->
                                        </button>
                                    </a> --}}


                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="100%">No Record Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
               {{--  <div style="padding: 10px; float: right;">
                    {!! $records->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div> --}}


        </section>
<br></br>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
<!-- Add this JavaScript code -->
<script>
    // Function to handle the search button click event
    function searchDepartments() {
        var id = document.getElementById('search_id').value;
        var name = document.getElementById('search_name').value;

        // Redirect to the index page with search parameters
        window.location.href = "{{ url('admin/Departments') }}?id=" + id + "&name=" + name;
    }
</script>



