@extends('layouts.master-fr')

@section('content')
<div class="row" style="margin-top: -70px !important;">
	<div class="col-lg-3">
		<div class="card border-primary" style="border-radius: 0px !important;">
			<div class="card-header bg-primary text-white" style="border-radius: 0px !important;">
				Katalog Produk
			</div>
			<div class="card-body" style="border-radius: 0px !important; padding-bottom: 0px;">
				<form action="{{ url('/list-product') }}" method="get">
					<h6>Kategori Produk &ensp; : </h6>
					@foreach ($category as $item)
						<div class="form-check" style="padding-left: 40px; margin-top: 10px;">
							<input class="form-check-input" type="checkbox" name="category[]" value="{{ $item->slug }}" id="category{{$loop->iteration}}">
							<label class="form-check-label" for="category{{$loop->iteration}}">
								{{ $item->name }}
							</label>
						</div>
					@endforeach
					<div class="form-group" style="margin-top: 10px;">
						<label for="">Range Harga : </label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1" style="border-radius: 0px;">Rp. </span>
							</div>
							<input type="number" class="form-control" placeholder="20000" name="harga_awal" aria-label="harga-awal" aria-describedby="basic-addon1" style="border-radius: 0px;">
						</div>
						<div class="text-center" style="margin-bottom: 4px;">
							<small>Sampai</small>
						</div>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon2" style="border-radius: 0px;">Rp. </span>
							</div>
							<input type="number" class="form-control" placeholder="20000" name="harga_akhir" aria-label="harga-akhir" aria-describedby="basic-addon2" style="border-radius: 0px;">
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block" style="border-radius: 0px;">
							Filter Produk
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-9">
		<div class="card border-white" style="border-radius: 0px !important; ">
			<div class="card-header bg-white border-white text-center" style="border-radius: 0px !important;">
				<h5>List Produk</h5>
			</div>
			<div class="card-body" style="border-radius: 0px; padding: 40px;">
				<div class="row">
					@foreach ($products as $item)
					<div class="col-lg-4 col-md-4 col-sm-6 mix {{ str_replace(' ','', $item->category->name) }} fresh-meat">
						<div class="featured__item">
							<div class="featured__item__pic set-bg" data-setbg="{{ url($item->image) }}" onclick="window.location='{{ url('product/detail', $item->id) }}'">
								<ul class="featured__item__pic__hover">
									@if ($item->stock == 0)
									<li><a href="#" data-toggle="tooltip" data-placement="top" title="Stok Habis !!"><i class="fa fa-times"></i></a></li>
									@else
									<li><a href="#" data-toggle="tooltip" data-placement="top" title="Stok Tersedia : {{ $item->stock }}"><i class="fa fa-archive"></i></a></li>
									@endif
								</ul>
							</div>
							<div class="featured__item__text">
								<h6><a href="{{ url('product/detail', $item->id) }}">{{ $item->name }}</a></h6>
								<h5>Rp. {{ number_format($item->price, 0, ',', '.') }}</h5>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection