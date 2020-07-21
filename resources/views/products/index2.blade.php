@extends('layouts.master-back')

@section('content')
<div class="card">
	<div class="card-header border-0">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="mb-0">
					<i class="ni ni-settings-gear-65 text-primary"></i> &ensp;
					Data Kategori
				</h3>
			</div>
			<div class="col text-right">
				<a href="{{ url('/product/create') }}" class="btn btn-sm btn-primary">
					Tambah Data
				</a>
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<!-- Projects table -->
		<table class="table align-items-center table-flush" id="table1">
			<thead class="thead-light">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nama</th>
					<th scope="col">Kategori</th>
					<th scope="col">Harga</th>
					<th scope="col">Stock</th>
					<th scope="col">Status</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($products as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td><a href="{{ url($item->image) }}" data-lightbox="image-{{ $loop->iteration }}" data-title="{{ $item->name }}">{{ $item->name }}</a></td>
					<td>{{ $item->category->name }}</td>
					<td>Rp. {{ number_format($item->price,0) }}</td>
					<td>{{ $item->stock }}</td>
					<td>
						@if($item->status == 'publish')
							<a class="btn btn-sm btn-info text-white"><b>{{ ucwords($item->status) }}</b></a>
						@else
							<a class="btn btn-sm btn-warning text-white"><b>{{ ucwords($item->status) }}</b></a>
						@endif
					</td>
					<td>
						<div class="dropdown">
							<a class="btn btn-sm btn-default btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-ellipsis-v"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
								<a class="dropdown-item" href="{{ url('/product/detail/'. $item->id) }}" target="_blank">Detail Data</a>
								<a class="dropdown-item" href="{{ route('product.edit', ['id' => $item->id]) }}">Edit Data</a>
								<a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('delete{{ $loop->iteration }}').submit();">Hapus Data</a>
							</div>

							<form action="{{ route('product.destroy', ['id' => $item->id]) }}" method="post" id="delete{{ $loop->iteration }}" onsubmit="return confirm('Delete this posts permanently ?')">
								@csrf
								@method('DELETE')
							</form>
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