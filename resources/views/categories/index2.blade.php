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
				<a href="{{ url('/category/create') }}" class="btn btn-sm btn-primary">
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
					<th scope="col">Slug</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($categories as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $item->name }}</td>
					<td><a class="btn btn-default btn-sm text-white"><b>{{ $item->slug }}</b></a></td>
					<td class="text-right">
						<div class="dropdown">
							<a class="btn btn-sm btn-default btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-ellipsis-v"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
								<a class="dropdown-item" href="{{ route('category.edit', ['id' => $item->id]) }}">Edit Data</a>
								<a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('delete{{ $loop->iteration }}').submit();">Hapus Data</a>
							</div>
							
							<form action="{{ route('category.destroy', ['id' => $item->id]) }}" method="post" id="delete{{ $loop->iteration }}" onsubmit="">
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