@extends('layouts.master-back')

@section('css')
<link rel="stylesheet" href="{{ asset('backend') }}/select2/css/select2.min.css" type="text/css">
<style>
	.select2-selection--single {
		height: 37px !important;
	}
	.detail {
		display: none;
	}
</style>
@endsection

@section('content')
<div class="card">
	<div class="card-header border-0">
		<div class="row align-items-center">
			<div class="col-12">
				<h3 class="mb-0">
					<i class="fa fa-shopping-cart text-success"></i> &ensp;
					Point of Sales
				</h3>
			</div>
			<div class="col text-right">
				<input type="date" name="date" id="date" class="form-control-sm" style="width: 20%;" value="{{ date('Y-m-d') }}" disabled>
				<input type="text" name="user_id" id="user_id" class="form-control-sm" style="width: 20%;" value="{{ auth()->user()->name }}" disabled> &ensp;
				<a href="{{ route('cart.destroy') }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Untuk Membatalkan Transaksi ? \nSemua data keranjang akan di-hapus.');">Batalkan Transaksi</a>
				<a href="{{ route('pos.store') }}" class="btn btn-sm btn-success" onclick="event.preventDefault(); document.getElementById('selesai').submit();">Selesai</a>
				<form action="{{ route('pos.store') }}" method="post" id="selesai">
					@csrf
				</form>
			</div>
		</div>
	</div>
	<div class="card-body pt-0">
		<div class="row">
			<div class="col-12">
				<div class="form-group">
					<label class="form-control-label">Produk : </label>
					<select name="product_id" id="product_id" class="form-control form-control-sm select2" data-placeholder="Masukan Nama Produk...">
						<option value=""></option>
						@foreach ($product as $item)
							<option value="{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}" data-type="{{ $item->type }}" data-stock="{{ $item->stock }}">{{ $item->name }} &ensp; | &ensp; Jenis : {{ $item->type }} &ensp; | &ensp; Stock : {{ $item->stock }} </option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-5 col-lg-5 detail">
				<div class="form-group">
					<label class="form-control-label">Nama Produk : </label>
					<input type="text" name="name" id="name" class="form-control form-control-sm" value="" placeholder="Silahkan Pilih Produk..." readonly>
				</div>
			</div>
			<div class="col-md-3 col-lg-3 detail">
				<div class="form-group">
					<label class="form-control-label">Jenis Produk : </label>
					<input type="text" name="jenis" id="jenis" class="form-control form-control-sm" value="" placeholder="Silahkan Pilih Produk..." readonly>
				</div>
			</div>
			<div class="col-md-2 col-lg-2 detail">
				<div class="form-group">
					<label class="form-control-label">Stock Produk : </label>
					<input type="text" name="stock" id="stock" class="form-control form-control-sm" value="" placeholder="Silahkan Pilih Produk..." readonly>
				</div>
			</div>
			<div class="col-md-2 col-lg-2 detail">
				<div class="form-group">
					<label class="form-control-label">Qty : </label>
					<input type="number" name="qty" id="qty" class="form-control form-control-sm" value="0" placeholder="0">
					<input type="number" name="qtyEdit" id="qtyEdit" class="form-control form-control-sm" value="0" placeholder="0" style="display: none;">
				</div>
			</div>
			<div class="col-12 cart">
				<div class="table-responsive">
					<table class="table align-items-center table-flush">
						<thead>
							<tr>
								<th>Nama Produk</th>
								<th>Qty</th>
								<th>Harga</th>
								<th>Subtotal</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody class="cart-body">
							@forelse ($cart->content() as $item)
								<tr>
									<td>{{ $item->name }}</td>
									<td>{{ $item->qty }} Pcs</td>
									<td>Rp. {{ $item->price }}</td>
									<td>Rp. {{ str_replace('.00', '', $item->subtotal) }}</td>
									<td class="text-center">
										<button class="btn btn-sm btn-warning edit" data-rowid="{{ $item->rowId }}">
											<i class="fa fa-edit"></i>
										</button>
										<button class="btn btn-sm btn-danger delete" data-rowid="{{ $item->rowId }}">
											<i class="fa fa-trash"></i>
										</button>
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="5" class="text-center">
										<h4>Belum Ada Data</h4>
									</td>
								</tr>
							@endforelse
						</tbody>
						<tfoot class="cart-footer">
							<tr>
								<td colspan="3" class="text-right">
									<h5>Total : </h5>
								</td>
								<td>
									<h5>Rp. {{ $cart->total(0, ',', '.') }}</h5>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>		
@endsection

@section('script')
<script src="{{ asset('backend') }}/select2/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
		$('.select2').select2();

		function clearInput() {
			$('#product_id').val(null).trigger('change');
			$('#name').val('');
			$('#jenis').val('');
			$('#stock').val('');
			$('#qty').val('');
			$('#qtyEdit').val('');
		}

		function showDetail() {
			$('.detail').show();
			$('#qty').show();
			$('#qtyEdit').removeData('rowid');
		}
		function hideDetail() {
			$('.detail').hide();
			$('#qtyEdit').hide();
		}

		function getTotal() {
			$.ajax({
				url: "{{ route('cart.getTotal') }}",
				method: "GET",
				success: function(res) {
					$('.cart-footer').empty();
					$('.cart-footer').append(`
						<tr>
							<td colspan="3" class="text-right">
								<h5>Total : </h5>
							</td>
							<td>
								<h5>Rp. ${res}</h5>
							</td>
						</tr>
					`);
				}
			});
		}

		function getCart() {
			var instance = 'pos';
			$.ajax({
				url: "{{ route('cart.getData') }}",
				method: "POST",
				data: {
					_token: "{{ csrf_token() }}",
				},
				success: function(res) {
					hideDetail();
					var cart = Object.values(res);
					$('.cart-body').empty();
					if (cart.length == 0) {
					$('.cart-body').append(`
						<tr id="emptyCart">
							<td colspan="5">
								Belum Ada Produk dalam Keranjang
							</td>
						</tr>
					`);
					} else {
						cart.forEach(item => {
							var subtotal = item.subtotal.replace('.00', '');
							$('.cart-body').append(`
								<tr>
									<td>${item.name}</td>
									<td>${item.qty} Pcs</td>
									<td>Rp. ${item.price}</td>
									<td>Rp. ${subtotal}</td>
									<td class="text-center">
										<button class="btn btn-sm btn-warning edit" data-rowid="${item.rowId}">
											<i class="fa fa-edit"></i>
										</button>
										<button class="btn btn-sm btn-danger delete" data-rowid="${item.rowId}">
											<i class="fa fa-trash"></i>
										</button>
									</td>
								</tr>
							`);
						});
					}
					getTotal();
				}
			});
		}

		function checkData(id) {
			$.ajax({
				url: "{{ route('cart.check') }}",
				method: "POST",
				data: {
					_token: "{{ csrf_token() }}",
					id: id,
				}, 
				success: function(res) {
					$('#name').val(res.name);
					$('#jenis').val(res.type);
					$('#stock').val(res.stock);
					hideDetail();
					showDetail();
					$('#qty').val(0).focus().select();
				} 
			});
		}

		function checkCartItem(rowId) {
			$.ajax({
				url: "{{ route('cart.checkCartItem') }}",
				method: "POST",
				data: {
					_token: "{{ csrf_token() }}",
					rowId: rowId,
				}, 
				success: function(res) {
					$('#name').val(res.product.name);
					$('#jenis').val(res.product.type);
					$('#stock').val(res.product.stock);
					hideDetail();
					showDetail();
					$('#qty').hide();
					$('#qtyEdit').show();
					$('#qtyEdit').data('rowid', rowId);
					$('#qtyEdit').val(res.cart.qty).focus().select();
				} 
			});
		}

		function addToCart() {
			var id = $('#product_id').val();
			var qty = $('#qty').val();

			$.ajax({
				url: "{{ route('cart.add') }}",
				method: "POST",
				data: {
					_token: "{{ csrf_token() }}",
					id: id,
					qty: qty,
				},
				success: function(res) {
					getCart();
					clearInput();
				}
			});
		}

		function updateToCart(rowId) {
			var qty = $('#qtyEdit').val();

			$.ajax({
				url: "{{ route('cart.update') }}",
				method: "POST",
				data: {
					_token: "{{ csrf_token() }}",
					rowId: rowId,
					qty: qty,
				},
				success: function(res) {
					getCart();
					clearInput();
				}
			});
		}

		function deleteItem(rowId) {
			$.ajax({
				url: "{{ route('cart.delete') }}",
				method: "POST",
				data: {
					_token: "{{ csrf_token() }}",
					rowId: rowId,
				},
				success: function(res) {
					getCart();
				}
			});
		}

		$('#product_id').on('change', function() {
			var id = $(this).val();
			var name = $(this).find(':selected').data('name');
			var price = $(this).find(':selected').data('price');
			var type = $(this).find(':selected').data('type');
			var stock = $(this).find(':selected').data('stock');
			if (id != '') {
				checkData(id);
			}
		});

		$('#qty').on('keypress', function(e) {
			if (e.which == 13) {
				if ($(this).val() != 0) {
					addToCart();
				} else {
					alert('Jumlah Pembelian Tidak Boleh Kosong !');
					$(this).focus().select();
				}
			}
		});

		
		$('#qtyEdit').on('keypress', function(e) {
			var rowId = $(this).data('rowid');
			if (e.which == 13) {
				if ($(this).val() != 0) {
					updateToCart(rowId);
				} else {
					alert('Jumlah Pembelian Tidak Boleh Kosong !');
					$(this).focus().select();
				}
			}
		});

		$('.card-body').on('click', '.delete', function() {
			var rowId = $(this).data('rowid');
			deleteItem(rowId);
		});

		$('.card-body').on('click', '.edit', function() {
			var rowId = $(this).data('rowid');
			checkCartItem(rowId);
		});
		
	});
</script>
@endsection