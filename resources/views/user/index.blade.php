@extends('layouts.master-back')

@section('content')
<div class="card">
	<div class="card-header border-0">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="mb-0">
					<i class="ni ni-settings-gear-65 text-primary"></i> &ensp;
					Data Pengguna
				</h3>
			</div>
			<div class="col text-right">
				<a href="{{ url('/user/create') }}" class="btn btn-sm btn-primary">
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
					<th scope="col">No.</th>
					<th scope="col">Nama Pengguna</th>
					<th scope="col">E-Mail</th>
					<th scope="col">Hak Akses</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($dataUser as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->email }}</td>
					<td>{{ ucfirst($item->role) }}</td>
					<td>
						<div class="dropdown">
							@if (auth()->user()->id == $item->id)
							<a href="#" class="btn btn-sm btn-default btn-icon-only text-light disabled" disabled>
								<i class="fa fa-times"></i>
							</a>
							@else								
							<a class="btn btn-sm btn-default btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-ellipsis-v"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
								<a class="dropdown-item" href="{{ route('user.edit', ['id' => $item->id]) }}">Edit Data</a>
								<a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('delete{{ $loop->iteration }}').submit();">Hapus Data</a>
							</div>

							<form action="{{ route('user.destroy', ['id' => $item->id]) }}" method="post" id="delete{{ $loop->iteration }}" onsubmit="return confirm('Delete this posts permanently ?')">
								@csrf
								@method('DELETE')
							</form>
							@endif
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