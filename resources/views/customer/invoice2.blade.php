@extends('layouts.master-fr')	

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-12 mb-4" style="margin: auto; padding: 10px;">
			<h4 class="text-center">Invoice</h4>
		</div>
		<div class="col-md-12 col-lg-12">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Nama Produk</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>SubTotal</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr>
							<td>{{ $product->name }}</td>
							<td>{{ $product->qty }}</td>
							<td>Rp. {{ number_format($product->price, 0, '.', ',') }}</td>
							<td>
								Rp. {{ number_format($product->subtotal(), 0, '.', ',') }}
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th colspan="2"></th>
							<th>Total &ensp; : </td>
							<th>Rp. {{ $total }}</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection