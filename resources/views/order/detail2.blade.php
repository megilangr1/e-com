@extends('layouts.master-back')	

@section('content')
<div class="card">
	<div class="card-header border-0">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="mb-0">
					<i class="ni ni-delivery-fast text-primary"></i> &ensp;
					Detail Pemesanan
				</h3>
			</div>
			<div class="col text-right">
				<a href="{{ url('/order') }}" class="btn btn-sm btn-danger">
					Kembali
				</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row" style="border: 1px solid #bcbcbc; border-radius: 5px; padding: 20px 20px; margin-bottom: 5px;">
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
			<div class="col-12">
				<br>
			</div>
			<div class="col-lg-12">
				<table class="table">
					<thead>
						<tr>
							<th>Produk</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Sub Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($details as $item)
						<tr>
							<td class="shoping__cart__item">
								<h5>
									<a href="{{ url($item->product->image) }}" data-lightbox="image-{{ $loop->iteration }}" data-title="{{ $item->product->name }}">{{ $item->product->name }}</a>
								</h5>
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

@section('script')

@endsection