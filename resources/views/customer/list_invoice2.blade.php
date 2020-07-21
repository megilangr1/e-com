@extends('layouts.master-fr')	

@section('content')
<div class="row" style="border: 1px solid #bcbcbc; border-radius: 4px; padding: 10px;">
	<div class="col-md-12 col-lg-12 mb-4" style="margin: auto; padding: 10px;">
		<h4 class="text-center">List Pemesanan</h4>
	</div>
	<div class="col-md-12 col-lg-12">
		<div class="table-responsive">
			<table id="myTable" class="table table-bordered table-hover">
				<thead>
				<tr>
						<th>ID</th>
						<th>Nama Penerima</th>
						<th>Alamat</th>
						<th>Total Bayar</th>
						<th>Tanggal</th>
						<th>Kode Pesanan</th>
						<th>Status</th>
						<th>Action</th>
				</tr>
				</thead>

				@foreach($orders as $index=>$order)
					<tbody>
						<tr>
							<td>{{ $index+1 }}</td>
							<td class="penerima" order-id="{{ $order->id }}" style="cursor: pointer; color: #00caff;">{{ $order->receiver }}</td>
							<td>{{ $order->address }}</td>
							<td > <button class="btn btn-default"><b>Rp. {{ number_format($order->total_price,0) }}</b></button></td>
							<td>{{ $order->date }}</td>
							<td align="center">{{ $order->id }}</td>
							<td>
								@if($order->status == 'belum bayar')
									<button type="button" class="btn bg-maroon">{{ ucwords($order->status) }}</button>
								@elseif($order->status == 'menunggu verifikasi')
									<button type="button" class="btn bg-orange">{{ ucwords($order->status) }}</button>
								@elseif($order->status == 'dibayar')
									<button type="button" class="btn btn-success">{{ ucwords($order->status) }}</button>
								@else
									<button type="button" class="btn bg-danger">{{ ucwords($order->status) }}</button>
								@endif
							</td>
							<td>
								<div class="btn-group" role="group" aria-label="Basic example">
									<a href="{{ route('invoice.detail', ['id' => $order->id]) }}" class="btn btn-info">Detail</a>									
									@if($order->status == 'belum bayar')
									<a href="{{ route('confirm.index', ['id' => $order->id]) }}" class="btn btn-success">Konfirmasi Pembayaran</a>
									@endif
								</div>
							</td>
						</tr>
					</tbody>
				@endforeach

				<tfoot>
				<tr>
					<th>ID</th>
					<th>Nama Penerima</th>
					<th>Alamat</th>
					<th>Total Bayar</th>
					<th>Tanggal</th>
					<th>Kode Pesanan</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>


<div class="modal fade" id="myModal">
	<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Detail Pesanan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
							<table class="table table-bordered">
									<thead>
									<tr>
											<th>#</th>
											<th>Nama Product</th>
											<th>Qty</th>
											<th>Subtotal</th>
									</tr>
							</table>
							</thead>

							<tbody id="detail-pesanan">

							</tbody>
					</div>
					<div class="modal-footer">
							<button type="button" class="btn btn-success pull-left" data-dismiss="modal">Tutup</button>
					</div>
			</div>
			<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
@endsection

@section('script')

<script>
	$(document).ready(function(){
			$('#myTable').DataTable();

			$('body').on('click', '.penerima', function(){
					var id = $(this).attr('order-id');

					$.ajax({
							type: 'get',
							dataType: 'json',
							url: "{{ url('invoice/detail') }}"+'/'+id,
							success: function(data){

									$.each(data.hasil, function(i,v){
											var pesanan = '<tr>';

											pesanan += '<td>';
											pesanan += i+1;
											pesanan += '</td>';

											pesanan += '<td>';
											pesanan += v.name_product;
											pesanan += '</td>';

											pesanan += '<td>';
											pesanan += v.qty;
											pesanan += '</td>';

											pesanan += '<td>';
											pesanan += v.subtotal;
											pesanan += '</td>';

											pesanan += '</tr>';

											$('#detail-pesanan').append(pesanan);
									});
							}
					});

					$('#myModal').modal();
			});
	});
</script>
@endsection