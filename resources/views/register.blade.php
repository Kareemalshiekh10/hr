<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('public/backend/plugins/css/Login.css') }}">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Register</h2>
                        <form id="registerForm" action="{{ url('register_post') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required value="{{ old('name') }}">
                            </div>
                            <span style="color:red;">{{ $errors->first('name') }}</span>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required value="{{ old('email') }}" onblur="duplicateEmail(this)">
                            </div>
                            <span style="color:red;" class="duplicate_message">{{ $errors->first('email') }}</span>
                            <div class="mb-3">
                                <label for="Phone" class="form-label">Phone</label>
                                <input type="number" class="form-control" id="Phone" name="Phone" placeholder="Enter your Phone" required value="{{ old('Phone') }}" onblur="duplicatePhone(this)">
                            </div>
                            <span style="color:red;" class="duplicate_Phone">{{ $errors->first('Phone') }}</span>
                            <div class="mb-3">
                                <label for="Department" class="form-label">Department</label>
                                <input type="text" class="form-control" id="Department" name="Department" placeholder="Enter your Department" required value="{{ old('Department') }}">
                            </div>
                            <div class="mb-3">
                                <label for="Position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="Position" name="Position" placeholder="Enter your Position" required value="{{ old('Position') }}">
                            </div>
                            <div class="mb-3">
                                <label for="Salary" class="form-label">Salary</label>
                                <input type="number" class="form-control" id="Salary" name="Salary" placeholder="Enter your Salary" required value="{{ old('Salary') }}">
                            </div>
                            <div class="mb-3">
                                <label for="Joining_Date" class="form-label">Joining Date</label>
                                <input type="date" class="form-control" id="Joining_Date" name="Joining_Date" placeholder="Enter your Joining Date" required value="{{ old('Joining_Date') }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <span style="color:red;">{{ $errors->first('password') }}</span>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                            </div>
                            <span style="color:red;">{{ $errors->first('confirm_password') }}</span>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        function duplicateEmail(element) {
            var email = $(element).val();
            /* alert(email); */
            $.ajax({
                type: "POST",
                url: '{{ url('checkemail') }}',
                data: {
                    email: email,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(res) {
                    if (res.exists) {
                        $('.duplicate_message').html("That Email is already taken. Try another.");
                    } else {
                        $('.duplicate_message').html("");
                    }
                },
                error: function(jqXHR, exception) {
                    console.log(err);
                }
            });
        }
        function duplicatePhone(element){
            var Phone = $(element).val();
            $.ajax({
                type: "POST",
                url: '{{ url('checkphone') }}',
                data: {
                    Phone: Phone,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(res) {
                    if (res.exists) {
                        $('.duplicate_Phone').html("That Phone is already taken. Try another.");
                    } else {
                        $('.duplicate_Phone').html("");
                    }
                },
                error: function(jqXHR, exception) {
                    console.log(err);
                }
            });
        }
    </script>
</body>

</html>
