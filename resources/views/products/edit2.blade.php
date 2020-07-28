@extends('layouts.master-back')	

@section('content')
<div class="card">
	<div class="card-header border-0">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="mb-0">
					<i class="ni ni-settings-gear-65 text-primary"></i> &ensp;
					Edit Data Produk
				</h3>
			</div>
			<div class="col text-right">
				<a href="{{ url('/product') }}" class="btn btn-sm btn-danger">
					Kembali
				</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-12">
				<form method="post" action="{{ route('product.update', ['id' => $product->id])  }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<input type="hidden" name="id" value="{{ $product->id }}">
					<div class="row">
						<div class="col-md-6 col-lg-6">
							<div class="form-group">
								<label for="" class="form-control-label">Nama Produk : </label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama Kategori..." value="{{ $product->name }}" autofocus required>
							</div>
						</div>
						<div class="col-md-6 col-lg-6">
							<div class="form-group">
								<label for="" class="form-control-label">Kategori Produk : </label>
								<select name="category_id" id="category_id" class="form-control" required>
									<option value="">Pilih Kategori</option>
									@foreach ($categories as $item)
										<option value="{{ $item->id }}" {{ $product->category_id == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-3 col-lg-3">
							<div class="form-group">
								<label for="" class="form-control-label">Harga : </label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Rp. </span>
									</div>
									<input type="number" name="price" id="price" min="0" class="form-control" placeholder="Masukan Harga Produk..." value="{{ $product->price }}" required>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-lg-2">
							<div class="form-group">
								<label for="" class="form-control-label">Stock : </label>
								<div class="input-group">
									<input type="number" name="stock" id="stock" min="0" class="form-control" placeholder="Masukan Jumlah Stock..." value="{{ $product->stock }}" required>
									<div class="input-group-append">
										<span class="input-group-text" id="basic-addon1"> Pcs</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-lg-3">
							<div class="form-group">
								<label for="" class="form-control-label">Jenis Produk : </label>
								<select name="type" id="type" class="form-control" required>
									<option value="Barang" {{ $product->type == 'Barang' ? 'selected':'' }}>Barang</option>
									<option value="Jasa" {{ $product->type == 'Jasa' ? 'selected':'' }}>Jasa</option>
								</select>
							</div>
						</div>
						<div class="col-md-4 col-lg-4">
							<div class="form-group">
								<label for="" class="form-control-label">Status Publish : </label>
								<select name="status" id="status" class="form-control" required>
									<option value="">Pilih Status</option>
									<option value="publish" {{ $product->status == 'publish' ? 'selected':'' }}>Publish</option>
									<option value="draft" {{ $product->status == 'draft' ? 'selected':'' }}>Draft</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 col-lg-12">
							<div class="form-group">
								<label for="" class="form-control-label">Deskripsi Produk : </label>
								<textarea name="description" id="description" rows="4" class="form-control" required>{{ $product->description }}</textarea>
							</div>
						</div>
						<div class="col-md-12 col-lg-12">
							<div class="form-group">
								<label for="" class="form-control-label">Foto Produk : </label>
								<div class="custom-file mb-3">
									<input type="file" class="custom-file-input" id="customFileLang" name="image" lang="en" required>
									<label class="custom-file-label" for="customFileLang">Pilih File</label>
								</div>
								<span class="help-block pl-1">
									Foto Produk Saat Ini : <a href="{{ url($product->image) }}" data-lightbox="image-1" data-title="{{ $product->name }}">{{ str_replace(' ', '_', $product->name) }}.jpg</a>
								</span>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<button type="submit" class="btn btn-success">
									Simpan Perubahan Data
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