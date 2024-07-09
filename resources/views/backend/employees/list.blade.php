@extends('backend.layouts.app')
@section('content')
    <div style="background-color: #cecece" class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employees</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">List</a></li>
                            <li class="breadcrumb-item active">Employees</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section style="margin-left: -230px" class="content">
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-1">
                            <label>ID</label>
                            <input type="text" name="id" class="form-control" value="{{ Request()->id }}" placeholder="ID">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Name</label>
                            <input type="text" value="{{ Request()->name }}" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Phone</label>
                            <input type="number" value="{{ Request()->Phone }}" name="Phone" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Email </label>
                            <input type="email" value="{{ Request()->email }}" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group col-md-2">
                            <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                            <a href="{{ url('admin/Employees') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
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
                            <th>
                                <button type="button" class="btn btn-primary" onclick="openCamera()">Attendance</button>
                            </th>
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
                                            <img src="{{ url('upload/' . $value->profile_image) }}" style="width: 50px; height: 50px;">
                                        @endif
                                    @endif
                                </td>
                                <td>{{ $value->Phone }}</td>
                                <td>{{ $value->Salary }}</td>
                                <td>{{ $value->Joining_Date }}</td>
                                <td>{{ !empty($value->is_role) ? 'HR' : 'EMPLOYEE' }}</td>
                                <td style="text-align: center;">
                                    <input type="checkbox" name="attendance_{{ $value->id }}" id="attendance_{{ $value->id }}" style="margin-right: 10px;">
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ url('admin/Employees/delete/' . $value->id) }}" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                        <a href="{{ url('admin/Employees/edit/' . $value->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ url('admin/Employees/view/' . $value->id) }}" class="btn btn-secondary">View</a>
                                    </div>
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
            </div>
        </section>
    </div>

    <!-- Modal for camera -->
    <div id="cameraModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeCamera()">&times;</span>
            <div class="video-container">
                <video id="video" width="400" height="300" autoplay></video>
                <button id="snap" class="btn btn-primary">Capture</button>
                <canvas id="canvas" width="320" height="240" style="display:none;"></canvas>
            </div>
        </div>
    </div>
    @endsection
    <!-- Inline JavaScript -->
    <script>
        // Open the camera modal
        function openCamera() {
            console.log('Opening camera...');
            document.getElementById('cameraModal').style.display = "flex";
            startCamera();
        }

        // Close the camera modal
        function closeCamera() {
            console.log('Closing camera...');
            document.getElementById('cameraModal').style.display = "none";
            stopCamera();
        }

        // Start the camera
        function startCamera() {
            var video = document.getElementById('video');
            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(function(stream) {
                    video.srcObject = stream;
                    video.play();
                })
                .catch(function(err) {
                    console.log("An error occurred: " + err);
                });
        }

        // Stop the camera
        function stopCamera() {
            var video = document.getElementById('video');
            var stream = video.srcObject;
            var tracks = stream.getTracks();

            for (var i = 0; i < tracks.length; i++) {
                tracks[i].stop();
            }

            video.srcObject = null;
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById("snap").addEventListener("click", function() {
                console.log('Capture button clicked');
                var canvas = document.getElementById('canvas');
                var video = document.getElementById('video');
                canvas.getContext('2d').drawImage(video, 0, 0, 320, 240);

                console.log('Image captured');
                canvas.toBlob(function(blob) {
                    console.log('Blob created');
                    var formData = new FormData();
                    formData.append('file', blob, 'capture.png');

                    console.log('Sending image to API');
                    fetch("http://127.0.0.1:7000/identify", {
                            method: "POST",
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log('API response received', data);
                            if (data.name) {
                                alert('Face recognized: ' + data.name);
                                document.querySelectorAll("tbody tr").forEach(row => {
                                    if (row.querySelector("td:nth-child(2)").innerText === data.name) {
                                        row.querySelector("input[type='checkbox']").checked = true;
                                    }
                                });
                            } else {
                                alert('Face not recognized');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }, 'image/png');

                closeCamera();
            });
        });
    </script>

   
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: #fefefe;
        border: 1px solid #888;
        width: 360px;
        padding: 0;
        margin-left: 700px;
        margin-right: 700px;
        text-align: center;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        margin: 10px;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .video-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px;
    }

    .video-container video {
        border: 1px solid #ddd;
        margin-bottom: 10px;
    }

    .action-buttons {
        display: flex;
        gap: 5px;
    }

    .action-buttons .btn {
        padding: 5px 10px;
        font-size: 12px;
    }
</style>


