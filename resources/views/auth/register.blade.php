<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Register page</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container">
			<div class="row justify-content-lg-center  w-500">
				<div class="shadow bg-white card-wrapper">
			
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Register</h4>
							<form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('register') }}">

								@if ( Session::get('success'))
									 <div class="alert alert-success">
										 {{ Session::get('success') }}
									 </div>
								@endif
								@if ( Session::get('error'))
									 <div class="alert alert-danger">
										 {{ Session::get('error') }}
									 </div>
								@endif
                                @csrf

								{{-- <div class="form-row">
									<div class="form-group col-md-6">
										<label for="father_name">Father Name</label>
										<input id="father_name" type="text" class="form-control" name="father_name"  autofocus placeholder="Enter Father Name" value="{{ old('name') }}">
									</div>
									<div class="form-group col-md-6">
										<label for="name">Mother Name</label>
										<input id="mother_name" type="text" class="form-control" name="mother_name"  autofocus placeholder="Enter Mother Name" value="{{ old('name') }}">
									</div>
								</div> --}}

								{{-- <div class="form-group">
									<label for="name">Address</label>
									<textarea name="address" id="address" class="form-control" rows="3"></textarea>
								</div>

								<div class="form-group">
									<label for="name">Phone Number</label>
									<input id="phone_number" type="number" class="form-control" name="phone_number"  placeholder="Enter Phone Number" value="{{ old('email') }}">
								</div>

								<div class="form-group">
									<label for="name">Office Address</label>
									<textarea name="office_address" id="office_address" class="form-control" rows="3"></textarea>
								</div> --}}

								{{-- <div class="form-group">
									<label for="name">Office Phone Number</label>
									<input id="office_phone_number" type="number" class="form-control" name="office_phone_number"  placeholder="Enter Office Phone Number" value="{{ old('email') }}">
								</div> --}}
{{-- 
								<hr> --}}
								<div class="form-group">
									<label for="username">Username</label>
									<input id="username" type="text" class="form-control" name="username"  placeholder="Enter Username" value="{{ old('username') }}">
									<span class="text-danger">@error('username'){{ $message }}@enderror</span>
								</div>

								<div class="form-group">
									<label for="email">Email</label>
									<input id="email" type="email" class="form-control" name="email"  placeholder="Enter Email" value="{{ old('email') }}">
									<span class="text-danger">@error('email'){{ $message }}@enderror</span>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password"  data-eye placeholder="Enter Password">
									<span class="text-danger">@error('password'){{ $message }}@enderror</span>
								</div>
                                <div class="form-group">
									<label for="password-confirm">Confirm Password</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required data-eye placeholder="Enter Confirm Password">
									<span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
                                    
								</div>
								<div class="form-group">
									<label for="username">Kategori</label>
									<select name="kategori" id="" class="form-control">
										<option value=""> Pilih Salah Satu </option>
										<option value="ayah"> Ayah </option>
										<option value="ibu"> Ibu </option>
										<option value="wali"> Wali </option>
									</select>
									<span class="text-danger">@error('username'){{ $message }}@enderror</span>
								</div>
								{{-- <div class="form-group">
										<label for="username">Nama Anak</label>
										<input type="text" class="form-control" name="namaanak" placeholder="nama anak lengkap">
										<span class="text-danger">@error('username'){{ $message }}@enderror</span>
									</div>
								<div class="form-group">
									<label for="username">Paket Layanan</label>
									<select name="kategorilayanan" id="paketlayanan" class="form-control">
										<option value=""> Pilih Salah Satu </option>
										<option value="hari"> Harian </option>
										<option value="minggu"> 2 mingguan </option>
										<option value="bulan"> Bulanan </option>
									</select>
									<span class="text-danger">@error('username'){{ $message }}@enderror</span>
								</div>
								<div class="form-group" id="harian">
									<label for="username">Pilih hari</label>
									<input type="text" class="form-control" name="layanan1">
									<span class="text-danger">@error('username'){{ $message }}@enderror</span>
								</div>
								<div class="form-group" id="mingguan">
									<label for="username">Pilih Tanggal Mingguan</label>
									<input type="date" class="form-control" name="layanan2">
									<span class="text-danger">@error('username'){{ $message }}@enderror</span>
								</div>
								<div class="form-group" id="bulanan">
										<label for="username">Pilih Tanggal Bulanan</label>
										<input type="date" class="form-control" name="layanan3">
										<span class="text-danger">@error('username'){{ $message }}@enderror</span>
									</div> --}}

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input">
										<label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
										<div class="invalid-feedback">
											You must agree with our Terms and Conditions
										</div>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										{{ __('Register') }}
									</button>
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a href="{{route('login')}}">Login</a>
								</div>
							</form>
						</div>
					</div>
			
				</div>
			</div>
		</div>
	</section>


	<script src="bootstrap/js/popper.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="{{ asset('js/my-login.js') }}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		document.getElementById("harian").hidden = true;
		document.getElementById("mingguan").hidden = true;
		document.getElementById("bulanan").hidden = true;
		$("#paketlayanan").on('change',function(){
			if (this.value == "hari") {
				document.getElementById("mingguan").hidden = true;
				document.getElementById("bulanan").hidden = true;
				document.getElementById("harian").hidden = false;
			}
			if (this.value == "minggu") {
				document.getElementById("mingguan").hidden = false;
				document.getElementById("bulanan").hidden = true;
				document.getElementById("harian").hidden = true;
			}
			if (this.value == "bulan") {
				document.getElementById("mingguan").hidden = true;
				document.getElementById("bulanan").hidden = false;
				document.getElementById("harian").hidden = true;
			}
			
		});
	});
	
	</script>
</body>
</html>