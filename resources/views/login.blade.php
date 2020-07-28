@extends('layouts.master-fr')

@section('content')
<style>
	input {
		border-radius: 0px !important;
	}
</style>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-lg-6" style="margin: auto; padding: 10px;">
			@if (auth()->check())
				<div class="row">
					<div class="col-12">
						<h5>Anda Sudah Login</h5>
					</div>
				</div>
			@else
			<form method="POST" action="{{ route('login') }}" id="login-form">
				@csrf
				<div class="form-group row text-center mb-5">
					<div class="col-12">
						<h4 style="background-color: #d22120; color: #fff; padding: 5px;">Login</h4>
					</div>
				</div>
				<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

						<div class="col-md-8">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

								@if ($errors->has('email'))
										<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('email') }}</strong>
										</span>
								@endif
						</div>
				</div>

				<div class="form-group row">
						<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

						<div class="col-md-8">
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

								@if ($errors->has('password'))
										<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('password') }}</strong>
										</span>
								@endif
						</div>
				</div>

				<div class="form-group row mb-5">
						<div class="col-md-8 offset-md-4">
								<button type="submit" hidden></button>
								<a type="submit" onclick="event.preventDefault(); document.getElementById('login-form').submit();" class="btn btn-danger text-white">
										{{ __('Login') }}
								</a>
								<a href="{{ route('register') }}" class="btn pull-right">
									Belum Punya Akun?
								</a>
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
			@endif
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="hero__item set-bg" data-setbg="{{ asset('frontend/undraw_Login_v483.png') }}">
			</div>
		</div>
	</div>
</div>
@endsection
