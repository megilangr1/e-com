@extends('layouts.master-back')	

@section('content')
<div class="card">
	<div class="card-header border-0">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="mb-0">
					<i class="ni ni-settings-gear-65 text-primary"></i> &ensp;
					Edit Data Kategori
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
				<form role="form" method="post" action="{{ route('category.update', ['id' => $category->id])  }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="" class="form-control-label">Nama Kategori : </label>
						<input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama Kategori..." value="{{ $category->name }}" autofocus required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-sm btn-success">
							Simpan Perubahan
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