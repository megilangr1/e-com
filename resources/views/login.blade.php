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
						<h5 style="background-color: green; color: #fff; padding: 5px;">Login Sekarang</h5>
					</div>
				</div>
				<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

						<div class="col-md-8">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Masukan E-Mail..." required autofocus>

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
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Masukan Password..." required>

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
								<a type="submit" onclick="event.preventDefault(); document.getElementById('login-form').submit();" class="primary-btn" style="color: white;">
										{{ __('Login') }}
								</a>
								<a href="{{ route('register') }}" class="primary-btn" style="background-color: orangered !important; color: white;">
									Daftar
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
						<h5 style="background-color: green; color: #fff; padding: 5px;"></h5>
					</div>
				</div>
			</form>
			@endif
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="hero__item set-bg" data-setbg="{{ asset('frontend/jersey.jpg') }}">
					<div class="hero__text">
							<span>Toko Jersey Online</span>
							<h2>Jersey <br />100% Ori</h2>
							<p>Gratis Ongkir !!</p>
							<button id="now" class="primary-btn">Belanja Sekarang</button>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection
