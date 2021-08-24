<!DOCTYPE html>
<html lang="en">
<head>
	<title>KPM Politeknik Negeri Indramayu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('isset')}}/issets/images/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('isset')}}/issets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('isset')}}/issets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('isset')}}/issets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('isset')}}/issets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('isset')}}/issets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('isset')}}/issets/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('isset')}}/issets/css/main.css">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="{{asset('isset')}}/issets/images/logo.png" sizes="96x96" />
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('isset')}}/issets/images/logo.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					@csrf

                    <span class="login100-form-title">
						LOGIN KPM POLINDRA 
					</span>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{('Email') }}</label>

                            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                <input class="input100" placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

					<div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" placeholder="Password"  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
					
					<div class="container-login100-form-btn">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="login100-form-btn">
                                {{ __('Login') }}
                            </button>

                        </div>
                    </div>

				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{asset('isset')}}/issets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('isset')}}/issets/vendor/bootstrap/js/popper.js"></script>
	<script src="{{asset('isset')}}/issets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('isset')}}/issets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('isset')}}/issets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('isset')}}/issets/js/main.js"></script>
<!--===============================================================================================-->
	<script language='JavaScript'>
		var txt =
			"SISTEM PENGUKURAN KEPUASAN LAYANAN MAHASISWA POLITEKNIK NEGERI INDRAMAYU ";
		var speed = 300;
		var refresh = null;
	
		function action() {
			document.title = txt;
			txt = txt.substring(1, txt.length) + txt.charAt(0);
			refresh = setTimeout("action()", speed);
		}
		action();
		</script>
<!--===============================================================================================-->
</body>
</html>