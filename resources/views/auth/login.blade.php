
<!doctype html>
<html lang="en">

<head>
<title>:: Lucid University :: Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{asset('backened/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('backened/assets/vendor/font-awesome/css/font-awesome.min.css')}}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('backened/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('backened/assets/css/color_skins.css')}}">
</head>

<body class="theme-blue">
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="top">
                        <img src="{{asset('backened/assets/images/logo-white.svg')}}" alt="Lucid">
                    </div>
					<div class="card">
                        <div class="header">
                            <p class="lead">Login to your account</p>
                        </div>
                        <div class="body">
                            <form method="POST" action="{{ route('login') }}">

                                @csrf

                                <div class="form-group">
                                    <label for="email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label sr-only">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">


                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>

                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
    <!-- END WRAPPER -->

    <!-- Javascript -->
<script src="{{asset('backened/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('backened/assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{asset('backened/assets/bundles/mainscripts.bundle.js')}}"></script>
</body>
</html>
