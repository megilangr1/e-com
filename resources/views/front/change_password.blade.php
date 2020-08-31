@extends('layouts.master-fr')

@section('content')
<style>
	input {
		border-radius: 0px !important;
	}
</style>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-lg-6">
			<div class="hero__item set-bg" data-setbg="{{ asset('frontend/undraw_Login_v483.png') }}">
			</div>
		</div>
		<div class="col-md-6 col-lg-6" style="margin: auto; padding: 10px;">
			@if (auth()->check())
				<div class="row">
					<div class="col-12">
						<form method="POST" action="{{ route('updatePassword') }}" id="change-password">
							@csrf
							<div class="form-group row text-center mb-5">
								<div class="col-12">
									<h4 style="background-color: #d22120; color: #fff; padding: 5px;">Ganti Password</h4>
								</div>
							</div>
							<div class="form-group row">
									<label for="old_password" class="col-md-4 col-form-label text-md-right">Password Lama</label>
			
									<div class="col-md-8">
											<input id="old_password" type="password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }} {{ session()->has('old_password') ? 'is-invalid':'' }}" name="old_password" placeholder="Masukan Password Lama..." required autofocus>
			
											@if ($errors->has('old_password'))
													<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('old_password') }}</strong>
													</span>
											@endif
											
											@if (session()->has('old_password'))
													<span class="invalid-feedback" role="alert">
															<strong>{{ session('old_password') }}</strong>
													</span>
											@endif
									</div>
							</div>
							<div class="form-group row">
									<label for="password" class="col-md-4 col-form-label text-md-right">Password Baru</label>
			
									<div class="col-md-8">
											<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Masukan Password Baru..." required>
			
											@if ($errors->has('password'))
													<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('password') }}</strong>
													</span>
											@endif
									</div>
							</div>
							<div class="form-group row">
									<label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Konfirmasi Password</label>
			
									<div class="col-md-8">
											<input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="Tulis Ulang Password Lama..." required>
			
											@if ($errors->has('password_confirmation'))
													<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('password_confirmation') }}</strong>
													</span>
											@endif
									</div>
							</div>
							<div class="form-group row mb-5">
									<div class="col-md-8 offset-md-4">
											{{-- <button type="submit" hidden></button> --}}
											{{-- <a type="submit" onclick="event.preventDefault(); document.getElementById('change-password').submit();" class="">
													{{ __('Ubah Password') }}
											</a> --}}
											<button type="submit" class="btn btn-danger text-white">
												Ubah Password
											</button>
											{{-- @if (Route::has('password.request'))
													<a class="btn btn-link" href="{{ route('password.request') }}">
															{{ __('Forgot Your Password?') }}
													</a>
											@endif --}}
									</div>
							</div>
			
							<div class="form-group row text-center mb-5">
								<div class="col-12">
									<h5 style="background-color: #d22120; color: #fff; padding: 5px;"></h5>
								</div>
							</div>
						</form>
					</div>
				</div>
			@else
				<script>
					window.location("{{ route('login') }}");
				</script>
			@endif
		</div>
	</div>
</div>
@endsection
