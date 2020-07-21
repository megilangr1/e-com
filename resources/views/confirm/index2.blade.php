@extends('layouts.master-back')

@section('content')
<div class="card">
	<div class="card-header border-0">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="mb-0">
					<i class="ni ni-money-coins text-primary"></i> &ensp;
					Data Pembayaran
				</h3>
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
					<th scope="col">Bukti</th>
					<th scope="col">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($confirms as $item)
				<tr>
					
					<td>{{ $loop->iteration }}</td>
					<td>{{ $item->user->name }}</td>
					<td>Rp. {{ number_format($item->order->total_price,0) }}</td>
					<td>{{ $item->order->date }}</td>
					<td>
							@if($item->status_order == 'belum bayar')
									<button type="button" class="btn btn-sm btn-danger text-white">{{ ucwords($item->status_order) }}</button>
							@elseif($item->status_order == 'menunggu verifikasi')
									<button type="button" class="btn btn-sm btn-warning text-white">{{ ucwords($item->status_order) }}</button>
							@elseif($item->status_order == 'dibayar')
									<button type="button" class="btn btn-sm btn-success text-white ">{{ ucwords($item->status_order) }}</button>
							@else
									<button type="button" class="btn btn-sm btn-danger text-white">{{ ucwords($item->status_order) }}</button>
							@endif
					</td>
					<td>
						<a href="{{ url('upload/confirm/'.$item->image) }}" data-lightbox="image-{{ $loop->iteration }}" data-title="Bukti Pembayaran" class="btn btn-default btn-sm">Lihat Bukti</a>
					</td>
					<td>
						<div class="btn-group">
							<a href="{{ url('/confirmAdmin/detail/'.$item->order_id) }}" class="btn btn-sm btn-info">Detail</a>
							<a href="{{ url('confirmAdmin/terima/'.$item->order_id) }}" class="btn btn-sm btn-success">Terima</a>
							<a href="{{ url('confirmAdmin/tolak/'.$item->order_id)}}" class="btn btn-sm btn-danger">Tolak</a>
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