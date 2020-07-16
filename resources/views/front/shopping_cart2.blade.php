@extends('layouts.master-fr')

@section('content')
<div class="row">
	<div class="col-lg-12">
			<div class="shoping__cart__table">
					<table>
							<thead>
									<tr>
											<th class="shoping__product">Produk</th>
											<th>Harga</th>
											<th>Jumlah</th>
											<th>Sub Total</th>
									</tr>
							</thead>
							<tbody>
								@foreach ($products as $item)
								<tr>
										<td class="shoping__cart__item">
												<img src="{{ url($item->options->image) }}" alt="" style="width: 100px; height: auto;">
												<h5>{{ $item->name }}</h5>
										</td>
										<td class="shoping__cart__price">
												Rp. {{ number_format($item->price, 0, '.', ',') }}
										</td>
										<td class="shoping__cart__quantity">
												<div class="quantity">
													<div class="input-group" style="width: 120px !important; margin: 0 auto !important;">
														<div class="input-group-prepend">
															<button rowId="{{ $item->rowId }}" class="btn btn-outline-secondary kurangi-qty" type="button"><i class="fa fa-minus"></i></button>
														</div>
														<input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" disabled value="{{ $item->qty }}">
														<div class="input-group-append">
															<button rowId="{{ $item->rowId }}" class="btn btn-outline-secondary add-qty" type="button"><i class="fa fa-plus"></i></button>
														</div>
													</div>
														{{-- <div class="pro-qty">
																<input type="text" value="{{ $item->qty }}" disabled>
														</div> --}}
												</div>
										</td>
										<td class="shoping__cart__total">
												Rp. {{ number_format($item->subtotal, 0, '.', ',') }}
										</td>
								</tr>
								@endforeach
							</tbody>
					</table>
			</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
			<div class="shoping__cart__btns">
					<a href="{{ url('/') }}" class="primary-btn cart-btn">Lanjutkan Belanja</a>
					<a href="{{ url('shopping-cart/destroy') }}" class="primary-btn cart-btn cart-btn-right" style="background: #b42a2a !important; color: #ffffff !important;"><span class="fa fa-times"></span> Kosongkan Keranjang</a>
			</div>
	</div>
	<div class="col-lg-6">
	</div>
	<div class="col-lg-6">
			<div class="shoping__checkout">
					<h5>Cart Total</h5>
					<ul>
							<li>Total <span>Rp. {{ Cart::subtotal() }}</span></li>
					</ul>
					<a href="{{ url('shopping-cart/checkout') }}" class="primary-btn">CHECKOUT</a>
			</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
			$('.add-qty').click(function(e){
					e.preventDefault();
					var rowId = $(this).attr('rowId');
					window.location.href = "{{ url('shopping-cart/update') }}"+'/'+rowId;
			});

			$('.kurangi-qty').click(function(e){
					e.preventDefault();
					var rowId = $(this).attr('rowId');
					window.location.href = "{{ url('shopping-cart/kurangi') }}"+'/'+rowId;
			});
	});
</script>
@endsection