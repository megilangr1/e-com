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
			<form method="POST" action="{{ route('register') }}">
				@csrf

				<div class="form-group row text-center mb-5">
					<div class="col-12">
						<h4 style="background-color: #d22120; color: #fff; padding: 5px;">Form Registrasi</h4>
					</div>
				</div>

				<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

						<div class="col-md-8">
								<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

								@if ($errors->has('name'))
										<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('name') }}</strong>
										</span>
								@endif
						</div>
				</div>

				<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

						<div class="col-md-8">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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

				<div class="form-group row">
						<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Ulangi Password') }}</label>

						<div class="col-md-8">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
						</div>
				</div>

				<div class="form-group row mb-5">
						<div class="col-md-8 offset-md-4">
								<button type="submit" class="btn btn-danger">
										{{ __('Daftar') }}
								</button>
								<a href="{{ route('login') }}" class="btn pull-right">
									Sudah Punya Akun?
								</a>
						</div>
				</div>
				
				<div class="form-group row text-center mb-5">
					<div class="col-12">
						<h5 style="background-color: #d22120; color: #fff; padding: 5px;"></h5>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="hero__item set-bg" data-setbg="{{ asset('frontend/undraw_authentication_fsn5.png') }}">
			</div>
		</div>
	</div>
</div>
@endsection
