@extends('layouts.master-back')	

@section('content')
<div class="card">
	<div class="card-header border-0">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="mb-0">
					<i class="ni ni-settings-gear-65 text-primary"></i> &ensp;
					Tambah Data Kategori
				</h3>
			</div>
			<div class="col text-right">
				<a href="{{ url('/category') }}" class="btn btn-sm btn-danger">
					Kembali
				</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6 col-lg-6">
				<form method="post" action="{{ route('category.store')  }}" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="" class="form-control-label">Nama Kategori : </label>
						<input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama Kategori..." value="{{ old('name') }}" autofocus required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-sm btn-success">
							Tambah Data
						</button>
						<button type="reset" class="btn btn-sm btn-danger">
							Reset Input
						</button>
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