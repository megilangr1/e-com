@extends('layouts.master-fr')	

@section('content')
<div class="row">
	<div class="col-lg-6 col-md-6">
			<div class="product__details__pic">
					<div class="product__details__pic__item">
							<img class="product__details__pic__item--large" src="{{ url($product->image) }}" alt="">
					</div>
			</div>
	</div>
	<div class="col-lg-6 col-md-6">
			<div class="product__details__text">
					<h3>{{ $product->name }}</h3>
					{{-- <div class="product__details__rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-o"></i>
						</div> --}}
						<span>Stok Tersedia : ({{ $product->stock }})</span>
					<div class="product__details__price">Rp. {{ number_format($product->price, 0, ',', '.') }}</div>
					<p>{{ $product->description }}</p>
					<a href="{{ url('add-to-cart/'.$product->id) }}" class="primary-btn"> <span class="fa fa-shopping-cart"></span> &ensp; Masukan Keranjang</a>
					<ul>
							<li><b>Ketersediaan</b> <span>Tersedia</span></li>
							<li><b>Stock Saat Ini</b> <span>{{ $product->stock }} pcs</span></li>
							<li><b>Share Produk </b>
									<div class="share">
											<a href="#"><i class="fa fa-facebook"></i></a>
											<a href="#"><i class="fa fa-twitter"></i></a>
											<a href="#"><i class="fa fa-instagram"></i></a>
											<a href="#"><i class="fa fa-pinterest"></i></a>
									</div>
							</li>
					</ul>
			</div>
	</div>
</div>
@endsection