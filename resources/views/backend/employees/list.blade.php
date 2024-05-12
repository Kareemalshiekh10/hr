@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div style="background-color: #cecece" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employees</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">List</a></li>
                            <li class="breadcrumb-item active">Employees</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- .content -->
        <section style="margin-left: -230px" class="content">

            <!-- Search Section -->

            <form method="get" action="">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-1">
                            <label>ID</label>
                            <input type="text" name="id" class="form-control" value="{{ Request()->id }}"
                                placeholder="ID">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Name</label>
                            <input type="text" value="{{ Request()->name }}" name="name" class="form-control"
                                placeholder="Name">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Phone</label>
                            <input type="number" value="{{ Request()->Phone }}" name="Phone" class="form-control"
                                placeholder="Phone">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Email </label>
                            <input type="email" value="{{ Request()->email }}" name="email" class="form-control"
                                placeholder="Email">
                        </div>

                        <div class="form-group col-md-2">
                            <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                            <a href="{{ url('admin/Employees') }}" class="btn btn-success"
                                style="margin-top: 30px;">Reset</a>
                        </div>

                    </div>
                </div>
            </form>


            <!-- /.search-section -->

            <div style="width: 1500px" class="container1">
                @include('_message')
                <h2>Employees</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Email</th>
                            <th>Profile Image</th>
                            <th>Phone</th>
                            <th>Salary</th>
                            <th>Joining Date</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($getRecord as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->Department }}</td>
                                <td>{{ $value->Position }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    @if (!empty($value->profile_image))
                                       @if (file_exists('upload/' . $value->profile_image))
                                        <img src="{{ url('upload/' . $value->profile_image) }}"
                                        style="width: 50 px; height: 50px;">
                                        @endif
                                    @endif
                                    {{-- <a href="{{ url('admin/Employees/image_delete/'.$value->id) }} " onclick="return confirm('Are you sure you want to delete image?')">
                                        <span class="btn" style="color: red;">Delete Image</span> --}}
                                </td>
                                <td>{{ $value->Phone }}</td>
                                <td>{{ $value->Salary }}</td>
                                <td>{{ $value->Joining_Date }}</td>
                                <td>{{ !empty($value->is_role) ? 'HR' : 'EMPLOYEE' }}</td>
                                <td>
                                    <a href="{{ url('admin/Employees/delete/'.$value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                    <a href="{{ url('admin/Employees/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('admin/Employees/view/'.$value->id) }}" class="btn btn-Secondary">view</a>

                                    {{-- <a href="{{ url('admin/Employees/delete/' . $value->id) }}">
                                        <button onclick="return confirm('Are you sure you want to delete?')">
                                            <i class="fas fa-trash-alt"></i> <!-- Delete icon -->
                                        </button>
                                    </a>

                                    <a href="{{ url('admin/Employees/edit/' . $value->id) }}">
                                        <button onclick="editEmployee(1)">
                                            <i class="fas fa-edit"></i> <!-- Edit icon -->
                                        </button>
                                    </a>

                                    <a href="{{ url('admin/Employees/view/' . $value->id) }}">
                                        <button onclick="infoEmployee(1)">
                                            <i class="fas fa-info"></i> <!-- Info icon -->
                                        </button>
                                    </a>
 --}}

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%">No Record Found.</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <div style="padding: 10px; float: right;">

                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                </div>


        </section>


        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
<!-- Add this JavaScript code -->
<script>
    // Function to handle the search button click event
    function searchEmployees() {
        var id = document.getElementById('search_id').value;
        var name = document.getElementById('search_name').value;

        // Redirect to the index page with search parameters
        window.location.href = "{{ url('admin/Employees') }}?id=" + id + "&name=" + name;
    }
</script>
