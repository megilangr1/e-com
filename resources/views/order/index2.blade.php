@extends('layouts.master-back')

@section('content')
<div class="card">
	<div class="card-header border-0">
		<div class="row align-items-center">
			<div class="col-12">
				<h3 class="mb-0">
					<i class="ni ni-money-coins text-primary"></i> &ensp;
					Data Pembayaran
				</h3>
			</div>
			<div class="col-12 text-right">
				<a href="{{ route('order.pdf') }}" class="btn btn-default btn-sm" target="_blank"> Export PDF </a>
				<a href="{{ route('order_lunas.pdf') }}" class="btn btn-info btn-sm" target="_blank"> Export PDF Paid Orders </a>
				<a href="{{ route('order.excel') }}" class="btn btn-default btn-sm"> Export Excel </a>
				<a href="{{ route('order_lunas.excel') }}" class="btn btn-info btn-sm"> Export Excel Paid Orders </a>
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<!-- Projects table -->
		<table class="table align-items-center table-flush" id="table1">
			<thead class="thead-light">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Pembeli</th>
					<th scope="col">Total</th>
					<th scope="col">Tanggal Pesan</th>
					<th scope="col">Status</th>
					<th scope="col">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($orders as $item)
				<tr>
					
					<td>{{ $loop->iteration }}</td>
					<td>{{ $item->user->name }}</td>
					<td>Rp. {{ number_format($item->total_price,0) }}</td>
					<td>{{ $item->date }}</td>
					<td>
							@if($item->status == 'belum bayar')
									<button type="button" class="btn btn-sm btn-danger text-white">{{ ucwords($item->status) }}</button>
							@elseif($item->status == 'menunggu verifikasi')
									<button type="button" class="btn btn-sm btn-warning text-white">{{ ucwords($item->status) }}</button>
							@elseif($item->status == 'dibayar')
									<button type="button" class="btn btn-sm btn-success text-white ">{{ ucwords($item->status) }}</button>
							@else
									<button type="button" class="btn btn-sm btn-danger text-white">{{ ucwords($item->status) }}</button>
							@endif
					</td>
					<td>
						<div class="btn-group">
							<a href="{{ url('/order/detail', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>		
@endsection

@section('script')
<script>
	$(document).ready(function() {
		$('#table1').DataTable();
	});
</script>
@endsection