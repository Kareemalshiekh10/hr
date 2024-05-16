<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 8px;
            padding: 12px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Register</h2>
                        <form id="registerForm" action="{{ url('register_post') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required value="{{ old('name') }}">
                                <span class="error-message">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required value="{{ old('email') }}" onblur="duplicateEmail(this)">
                                <span class="error-message">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone" required value="{{ old('phone') }}" onblur="duplicatePhone(this)">
                                <span class="error-message">{{ $errors->first('phone') }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" class="form-control" id="department" name="department" placeholder="Enter your department" required value="{{ old('department') }}">
                                <span class="error-message">{{ $errors->first('department') }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="position" name="position" placeholder="Enter your position" required value="{{ old('position') }}">
                                <span class="error-message">{{ $errors->first('position') }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="salary" class="form-label">Salary</label>
                                <input type="number" class="form-control" id="salary" name="salary" placeholder="Enter your salary" required value="{{ old('salary') }}">
                                <span class="error-message">{{ $errors->first('salary') }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="joining_date" class="form-label">Joining Date</label>
                                <input type="date" class="form-control" id="joining_date" name="joining_date" required value="{{ old('joining_date') }}">
                                <span class="error-message">{{ $errors->first('joining_date') }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                                <span class="error-message">{{ $errors->first('password') }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                                <span class="error-message">{{ $errors->first('confirm_password') }}</span>
                            </div>
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
                        $('.error-message').html("That email is already taken. Try another.");
                    } else {
                        $('.error-message').html("");
                    }
                },
                error: function(jqXHR, exception) {
                    console.log(err);
                }
            });
        }

        function duplicatePhone(element) {
            var phone = $(element).val();
            $.ajax({
                type: "POST",
                url: '{{ url('checkphone') }}',
                data: {
                    phone: phone,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(res) {
                    if (res.exists) {
                        $('.error-message').html("That phone number is already taken. Try another.");
                    } else {
                        $('.error-message').html("");
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
