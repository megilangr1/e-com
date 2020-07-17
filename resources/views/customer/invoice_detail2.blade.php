@extends('layouts.master-fr')	

@section('content')

<div class="container">
	<div class="row" style="border: 1px solid #bcbcbc; border-radius: 5px; padding: 10px; margin-bottom: 5px;">
		<div class="col-md-12 col-lg-12 mb-4" style="margin: auto; padding: 10px;">
			<h4 class="text-center">Detail Pemesanan</h4>
			<br>
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