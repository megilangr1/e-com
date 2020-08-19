@extends('layouts.master-back')	

@section('content')
<div class="card">
	<div class="card-header border-0">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="mb-0">
					<i class="ni ni-settings-gear-65 text-primary"></i> &ensp;
					Tambah Data Produk
				</h3>
			</div>
			<div class="col text-right">
				<a href="{{ url('/user') }}" class="btn btn-sm btn-danger">
					Kembali
				</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-12">
				<form method="post" action="{{ route('user.store')  }}" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-6 col-lg-6">
							<div class="form-group">
								<label for="" class="form-control-label">Nama Produk : </label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama Pengguna..." value="{{ old('name') }}" autofocus required>
							</div>
						</div>
						<div class="col-md-6 col-lg-6">
							<div class="form-group">
								<label for="" class="form-control-label">E-Mail : </label>
								<input type="email" name="email" id="email" class="form-control" placeholder="Masukan E-Mail..." value="{{ old('email') }}" required>
							</div>
						</div>
						<div class="col-md-4 col-lg-4">
							<div class="form-group">
								<label for="" class="form-control-label">Password : </label>
								<input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password Pengguna..." required>
							</div>
						</div>
						<div class="col-md-4 col-lg-4">
							<div class="form-group">
								<label for="" class="form-control-label">Konfirmasi Password : </label>
								<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Masukan Ulang Password..." required>
							</div>
						</div>
						<div class="col-md-4 col-lg-4">
							<div class="form-group">
								<label for="" class="form-control-label">Role Pengguna: </label>
								<select name="role" id="role" class="form-control" required>
									<option value="">Pilih Role</option>
									<option value="admin" {{ old('role') == 'admin' ? 'selected':'' }}>Admin</option>
									<option value="operator" {{ old('role') == 'operator' ? 'selected':'' }}>Operator</option>
									<option value="customer" {{ old('role') == 'customer' ? 'selected':'' }}>Customer</option>
								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<button type="submit" class="btn btn-success">
									Tambah Data
								</button>
								<button type="reset" class="btn btn-danger">
									Reset Input
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
	$(document).ready(function() {
		$('#name').focus();
	});
</script>
@endsection