<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Africa Market Admin</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

	<!-- Style-->
	<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">

</head>

<body class="hold-transition theme-primary bg-gradient-primary">

	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">

			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
						<div class="p-10 content-top-agile">
                            <img src="{{asset('logo/log.png') }} "alt="">
							<h2 class="text-white">Get started with Us</h2>
							<p class="text-white-50">Register a new membership</p>
						</div>
						<div class="p-30 rounded30 box-shadowed b-2 b-dashed">
							<form method="POST" action="{{ route('admin.register') }}">
								@csrf
								<div class="form-group">
									<div class="mb-3 input-group">
										<div class="input-group-prepend">
											<span class="text-white bg-transparent input-group-text"><i class="ti-user"></i></span>
										</div>
										<input  id="name" name="name" type="text" class="text-white bg-transparent form-control pl-15 plc-white" placeholder="Full Name" required>
									</div>
								</div>
								<div class="form-group">
									<div class="mb-3 input-group">
										<div class="input-group-prepend">
											<span class="text-white bg-transparent input-group-text"><i class="ti-email"></i></span>
										</div>
										<input id="email" name="email" type="email" class="text-white bg-transparent form-control pl-15 plc-white" placeholder="Email">
									</div>
								</div>
								<div class="form-group">
									<div class="mb-3 input-group">
										<div class="input-group-prepend">
											<span class="text-white bg-transparent input-group-text"><i class="ti-lock"></i></span>
										</div>
										<input id="password" name="password" type="password" class="text-white bg-transparent form-control pl-15 plc-white" placeholder="Password" required>
									</div>
								</div>
								<div class="form-group">
									<div class="mb-3 input-group">
										<div class="input-group-prepend">
											<span class="text-white bg-transparent input-group-text"><i class="ti-lock"></i></span>
										</div>
										<input  id="password_confirmation" type="password"name="password_confirmation" class="text-white bg-transparent form-control pl-15 plc-white" placeholder="Retype Password">
									</div>
								</div>
								  <div class="row">
									<div class="col-12">
									  <div class="text-white checkbox">
										<input type="checkbox" id="basic_checkbox_1" >
										<label for="basic_checkbox_1">I agree to the <a href="#" class="text-warning"><b>Terms</b></a></label>
									  </div>
									</div>
									<!-- /.col -->
									<div class="text-center col-12">
									  <button type="submit" class="btn btn-info btn-rounded margin-top-10">SIGN IN</button>
									</div>
									<!-- /.col -->
								  </div>
							</form>
							<div class="text-center">
								<p class="mb-0 text-white mt-15">Already have an account?<a href="{{route('admin.login')}}" class="ml-5 text-danger"> Sign In</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('backend/assets/icons/feather-icons/feather.min.js') }}"></script>


</body>
</html>
