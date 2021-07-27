<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        
        <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

    </head>
    <body>
        <div class="main-wrapper">
            <div class="page-wrapper full-page">
                <div class="page-content d-flex align-items-center justify-content-center">

                    <div class="row w-100 mx-0 auth-page">
                        <div class="col-md-8 col-xl-6 mx-auto">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-4 pr-md-0">
                                        <div class="auth-left-wrapper">
                                        </div>
                                    </div>
                                    <div class="col-md-8 pl-md-0">
                                        <div class="auth-form-wrapper px-4 py-5">
                                            <a href="{{ url('/') }}" class="noble-ui-logo d-block mb-2">CITRA<span>ADMIN</span></a>
                                            <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
                                            @if(session()->has('error_message'))
                                                <div class="alert alert-danger">
                                                    {{ session()->get('error_message') }}
                                                </div>
                                            @endif

                                            @if(session()->has('message'))
                                                <div class="alert alert-success">
                                                    {{ session()->get('message') }}
                                                </div>
                                            @endif
                                            <form class="forms-sample" method="POST" action="{{ url('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleInputUsername">Username</label>
                                                    <input type="text" name="username" class="form-control" id="exampleInputUsername" placeholder="Username" required autocomplete="off" value="{{ old('username') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword">Password</label>
                                                    <input type="password" name="userpassword" class="form-control" id="exampleInputPassword" autocomplete="current-password" placeholder="Password" required >
                                                </div>
                                                <div class="form-check form-check-flat form-check-primary d-none">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                    Remember me
                                                    </label>
                                                </div>
                                                <div class="mt-3">
                                                    <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white"><i class="btn-icon-prepend" data-feather="lock"></i> Login</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

	    <!-- core:js -->
	    <script src="{{ asset(mix('js/app.js')) }}"></script>
	
    </body>
</html>