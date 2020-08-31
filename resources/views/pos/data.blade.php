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
				<form method="GET" action="{{ route('pos.pdf') }}" class="form-inline" style="margin-top: 25px" target="_blank">
					<div class="form-group mb-2">
					  <input type="date" name="q" class="form-control form-control-sm" placeholder="Dari Tanggal" required>
					</div>
					<div class="form-group mx-sm-3 mb-2">
						<input type="date" name="p" class="form-control form-control-sm" placeholder="Sampai Tanggal" required>
					</div>
					<button type="submit" class="btn btn-primary btn-sm mb-2">Print</button>
				</form>
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