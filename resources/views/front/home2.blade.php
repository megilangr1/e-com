@extends('layouts.master-fr')

@section('content')
<div class="row">
	<div class="col-lg-12">
			<div class="section-title">
					<h2>Produk Unggulan</h2>
			</div>
			<div class="featured__controls">
					<ul>
							<li class="active" data-filter="*">Semua</li>
							@foreach ($category as $item)
							<li data-filter=".{{ str_replace(' ','', $item->name) }}">{{ $item->name }}</li>
							@endforeach
					</ul>
			</div>
	</div>
</div>
<div class="row featured__filter">
@foreach ($products as $item)
<div class="col-lg-3 col-md-4 col-sm-6 mix {{ str_replace(' ','', $item->category->name) }} fresh-meat">
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
@endsection