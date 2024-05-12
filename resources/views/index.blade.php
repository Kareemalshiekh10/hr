<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('public/backend/plugins/css/Login.css')}}">
</head>


{{-- php artisan cache:clear --}}  {{-- Clear the cache command --}}
<body>
    <div class="container">
        @include('_message')   {{-- Include the message file --}}
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Login</h2>
                        <form id="loginForm" action="{{ url('login_post') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="e.g., abc@example.com" required>
                            </div>
                            <span style="color:red;">{{ $errors-> first('email') }}</span>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <span style="color:red;">{{ $errors-> first('password') }}</span>
                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <div class="text-center">   
                                <a href="{{ url('forget_password') }}">Forgot Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p>Don't have an account? <a href="{{ url('register') }}">Register</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>
