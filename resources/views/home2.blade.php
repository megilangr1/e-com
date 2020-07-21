@extends('layouts.master-back')

@section('content')
<div class="row">
	<div class="col-xl-3 col-md-6">
		<div class="card card-stats">
			<!-- Card body -->
			<div class="card-body">
				<div class="row">
					<div class="col">
						<h5 class="card-title text-uppercase text-muted mb-0">Pengguna</h5>
						<span class="h2 font-weight-bold mb-0">{{ count($user) }} Akun</span>
					</div>
					<div class="col-auto">
						<div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
							<i class="ni ni-circle-08"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6">
		<div class="card card-stats">
			<!-- Card body -->
			<div class="card-body">
				<div class="row">
					<div class="col">
						<h5 class="card-title text-uppercase text-muted mb-0">Pemesanan</h5>
						<span class="h2 font-weight-bold mb-0">{{ count($orders) }} Data</span>
					</div>
					<div class="col-auto">
						<div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
							<i class="ni ni-chart-pie-35"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-6 col-md-12">
		<div class="card card-stats">
			<!-- Card body -->
			<div class="card-body">
				<div class="row">
					<div class="col">
						<h5 class="card-title text-uppercase text-muted mb-0">Pendapatan</h5>
						<span class="h2 font-weight-bold mb-0">Rp. {{ number_format($orders->where('status', 'dibayar')->sum('total_price'), 0, ',', '.') }}</span>
					</div>
					<div class="col-auto">
						<div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
							<i class="ni ni-money-coins"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-md-4 mb-4">
		<div class="card">
			<img class="card-img-top" src="{{ asset('backend/noimage.png') }}" alt="Card image cap" style="max-width: 180px; margin: 0 auto; padding: 10px 0px; ">
			<div class="card-body text-center">
				<h4 class="card-title text-center">Halo ! Selamat Datang, {{ auth()->user()->name }}</h5>
				<p class="card-text"></p>
				{{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
			</div>
		</div>
	</div>
	<div class="col-xl-8 col-md-8 mb-4">
		<div class="card">
			<div class="card-header border-0">
				<div class="row align-items-center">
					<div class="col-12">
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
	</div>
</div>	
@endsection