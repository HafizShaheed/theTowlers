<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="robots" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">


<meta name="format-detection" content="telephone=no">
    <!-- PAGE TITLE HERE -->
    <title>The Towellers  | Admin-Login </title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{URL::to('/public/admin/assets/images/logo/logo.png')}}">




    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="{{URL::to('/public/admin/assets')}}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link  href="{{URL::to('/public/admin/assets')}}/css/style.css" rel="stylesheet">
    <link  href="{{URL::to('/public/admin/assets')}}/css/dev-admin-custom.css" rel="stylesheet">
</head>
<body class="vh-100">
    <div class="authincation h-100">
        <!--**********************************
	Content body start
***********************************-->
<div class="container-fluid h-100">
	<div class="row h-100">
    <div class="col-xl-6 col-lg-6">
			<div class="pages-left h-100">
				<div class="login-content">
					<a href="../index.html"><img  src="{{URL::to('/public/admin/assets')}}/images/logo-full.png" class="mb-3 logo-dark" alt=""></a>
					<a href="../index.html"><img  src="{{URL::to('/public/admin/assets')}}/images/logi-white.png" class="mb-3 logo-light" alt=""></a>

					<p>
						{{ strtoupper('Excellence in every thread') }}
						{{-- Towellers is at the forefront of redefining textile manufacturing in Pakistan. Established in 1973, Towellers has always prioritized a seamless production process that guarantees exceptional quality across its diverse product range. --}}
					</p>
				</div>
				<div class="login-media text-center">
					<!-- <img  src="{{URL::to('/public/admin/assets')}}/images/Towellers is at the forefront of redefining textile manufacturing in Pakistan. Established in 1973, Towellers has always prioritized a seamless production process that guarantees exceptional quality across its diverse product range." alt=""> -->
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-12 col-sm-12 mx-auto align-self-center">
			<div class="login-form">
				<div class="text-center">
					<h3 class="title">Sign In</h3>
					{{-- <p>Sign in to your account to start using The Towellers Admin Dahsboard</p> --}}
                    @if(session()->has('success'))
                   <div class="alert alert-success">
                       {{ session()->get('success') }}
                   </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
				</div>
                <form action="{{route('admin.loginSubmit')}}" method="post">
                  @csrf
					<div class="mb-4">
						<label class="mb-1 text-dark">Email</label>
						<input type="email" class="form-control form-control" placeholder="Please Enter Email"  name="email">
					</div>
					<div class="mb-4 position-relative">
						<label class="mb-1 text-dark">Password</label>
						<input type="password" id="dz-password" class="form-control form-control" placeholder="Please Enter Password"   name="password">
						<span class="show-pass eye">

							<i class="fa fa-eye-slash"></i>
							<i class="fa fa-eye"></i>

						</span>
					</div>
					<!-- <div class="form-row d-flex justify-content-between mt-4 mb-2">
						<div class="mb-4">
							<div class="form-check custom-checkbox mb-3">
								<input type="checkbox" class="form-check-input" id="customCheckBox1" required="">
								<label class="form-check-label" for="customCheckBox1">Remember my preference</label>
							</div>
						</div>
						<div class="mb-4">
							<a href="ForgotPassword.html" class="btn-link text-primary">Forgot Password?</a>
						</div>
					</div> -->
					<div class="text-center mb-4">
						<button type="submit" class="btn btn report-tab-active btn-block">Sign In</button>
					</div>
					<!-- <h6 class="login-title"><span>Or continue with</span></h6>

					<div class="mb-3">
						<ul class="d-flex align-self-center justify-content-center">
							<li><a target="_blank" href="https://www.facebook.com/" class="fab fa-facebook-f btn-facebook"></a></li>
							<li><a target="_blank" href="https://www.google.com/" class="fab fa-google-plus-g btn-google-plus mx-2"></a></li>
							<li><a target="_blank" href="https://www.linkedin.com/" class="fab fa-linkedin-in btn-linkedin me-2"></a></li>
							<li><a target="_blank" href="https://twitter.com/" class="fab fa-twitter btn-twitter"></a></li>
						</ul>
					</div>
					<p class="text-center">
						Not registered?
						<a class="btn-link text-primary" href="Register.html">Register</a>
					</p> -->
				</form>
			</div>
		</div>

	</div>
</div>
<!--**********************************
	Content body end
***********************************-->


    </div>

	<!--**********************************
		Scripts
	***********************************-->
	<!-- Required vendors -->
	<script  src="{{URL::to('/public/admin/assets')}}/vendor/global/global.min.js"></script>
	<script  src="{{URL::to('/public/admin/assets')}}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script  src="{{URL::to('/public/admin/assets')}}/js/deznav-init.js"></script>
	<script  src="{{URL::to('/public/admin/assets')}}/js/demo.js"></script>
	<script  src="{{URL::to('/public/admin/assets')}}/js/custom.js"></script>

</body>

</html>
