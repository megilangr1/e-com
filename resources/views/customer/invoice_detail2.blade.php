@extends('layouts.master-fr')	

@section('content')
<style>
	.det {
		font-size: 16px !important;
		font-weight: 800 !important;
	}
</style>
<div class="container">
	<div class="row" style="border: 1px solid #bcbcbc; border-radius: 5px; padding: 10px; margin-bottom: 5px;">
		<div class="col-md-12 col-lg-12 mb-4" style="margin: auto; padding: 10px;">
			<h4 class="text-center">Detail Pemesanan</h4>
			<br>
			<hr>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 mb-2">Jasa Pengiriman</div>
		<div class="col-xs-8 col-sm-8 col-md-1 col-lg-1 mb-2">:</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 mb-2 det">{{ strtoupper($order->courier->code) }} - {{ strtoupper($order->courier->type) }}</div>
		<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 mb-2">Penerima</div>
		<div class="col-xs-8 col-sm-8 col-md-1 col-lg-1 mb-2">:</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 mb-2 det">{{ $order->receiver }}</div>
		<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 mb-2">Alamat Kirim</div>
		<div class="col-xs-8 col-sm-8 col-md-1 col-lg-1 mb-2">:</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 mb-2 det">{{ $order->address }}</div>
		<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 mb-2">Status</div>
		<div class="col-xs-8 col-sm-8 col-md-1 col-lg-1 mb-2">:</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 mb-2 det">{{ $order->status }}</div>
		<div class="col-md-12 col-lg-12">
			<br><br>
			<hr>
		</div>
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
									@foreach ($details as $item)
									<tr>
											<td class="shoping__cart__item">
												<img src="{{ url($item->product->image) }}" alt="" style="width: 100px; height: auto;">
												<h5>{{ $item->product->name }}</h5>
											</td>
											<td class="shoping__cart__price">
													Rp. {{ number_format($item->product->price, 0, '.', ',') }}
											</td>
											<td class="shoping__cart__quantity">
												<h5><b>{{ $item->qty }} PCS</b></h5>
											</td>
											<td class="shoping__cart__total">
													Rp. {{ number_format($item->subtotal, 0, '.', ',') }}
											</td>
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2" style="padding-top: 20px;"></td>
										<td style="padding-top: 20px;">
											<h5><b>Ongkos Kirim</b></h5>
										</td>
										<td style="padding-top: 20px;">
											<h5><b>Rp. {{ number_format($order->courier->price,0, '.', ',') }}</b></h5>
										</td>
									</tr>
									<tr>
										<td colspan="2" style="padding-top: 20px;"></td>
										<td style="padding-top: 20px;">
											<h5><b>Total</b></h5>
										</td>
										<td style="padding-top: 20px;">
											<h5><b>Rp. {{ number_format($item->order->total_price,0) }}</b></h5>
										</td>
									</tr>
								</tfoot>
						</table>
				</div>
		</div>
	</div>
</div>
@endsection