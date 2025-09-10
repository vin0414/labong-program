<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LABONG Program Monitoring System</title>
    <meta charset="UTF-8">
    <meta name="keywords"
        content="LABONG, Program Monitoring System, Projects Dashboard, Activity Details, Consolidated Report, Create Project">
    <meta name="description"
        content="A comprehensive monitoring system for the LABONG program, featuring project dashboards, activity details, consolidated reports, and project creation functionalities.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="assets/images/deped-gentri-logo.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="row g-3 m-5">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="login-container">
                        <div class="text-center">
                            <img src="assets/images/deped-gentri-logo.png" alt="DepEd Logo" width="100" height="100">
                        </div>
                        <h4 class="text-center">LABONG Program Monitoring System</h4>
                        <h6 class="text-center">Login to your account</h6>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <form method="POST" class="row g-3" action="{{ route('auth') }}">
                            @csrf
                            <div class="col-lg-12">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="form-control" required />
                                @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-12">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" required />
                                @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-12">
                                <input type="checkbox" id="showPassword" style="width:15px;height:15px;"
                                    onclick="togglePasswordVisibility()">
                                <label for="showPassword">Show Password</label>
                                <script>
                                function togglePasswordVisibility() {
                                    var passwordField = document.getElementById("password");
                                    if (passwordField.type === "password") {
                                        passwordField.type = "text";
                                    } else {
                                        passwordField.type = "password";
                                    }
                                }
                                </script>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-sign-in"></i>&nbsp;Login
                                </button>
                                <a class="btn btn-secondary" href="{{ route('/') }}" style="text-decoration: none;">
                                    <i class="fas fa-arrow-left"></i>&nbsp;Return
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>