@extends('layouts.master-back')

@section('content')
<div class="card">
	<div class="card-header border-0">
		<div class="row align-items-center">
			<div class="col-12">
				<h3 class="mb-0">
					<i class="ni ni-money-coins text-primary"></i> &ensp;
					Data Penjualan
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
					<th scope="col">No. </th>
					<th scope="col">Tanggal Transaksi</th>
					<th scope="col">Jumlah Item</th>
					<th scope="col">Total</th>
					<th scope="col">User</th>
					<th scope="col">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($pos as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ date('d M Y | H : i : s', strtotime($item->created_at)) }}</td>
					<td>{{ count($item->detail) }} Item</td>
					<td>Rp. {{ number_format($item->total, 0) }}</td>
					<td>{{ $item->user->name }}</td>
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