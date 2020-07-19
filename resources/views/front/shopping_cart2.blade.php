@extends('layouts.master-fr')

@section('css')
<link href="{{ asset('frontend') }}/select2/css/select2.min.css" rel="stylesheet" />
<style>
	.select2-container--default .select2-selection--single {
		border-radius: 0px !important;
	}
	.select2-container .select2-selection--single {
		height: 35px !important;
	}
	.select2-container--default .select2-selection--single .select2-selection__rendered {
		line-height: 32px !important;
	}
	.select2-container--default .select2-selection--single .select2-selection__arrow {
		height: 35px !important;
	}
</style>
@endsection

@section('content')
<div class="row" style="border: 1px solid #bcbcbc; border-radius: 5px; padding: 10px; margin-bottom: 5px;">
	<div class="col-lg-12">
			<div class="shoping__cart__table">
					<table>
							<thead>
									<tr>
											<th class="shoping__product">Produk</th>
											<th>Harga</th>
											<th>Jumlah</th>
											<th>Sub Total</th>
									</tr>
							</thead>
							<tbody>
								@foreach ($products as $item)
								<tr>
										<td class="shoping__cart__item">
											<img src="{{ url($item->options->image) }}" alt="" style="width: 100px; height: auto;">
											<h5>{{ $item->name }}</h5>
										</td>
										<td class="shoping__cart__price">
												Rp. {{ number_format($item->price, 0, '.', ',') }}
										</td>
										<td class="shoping__cart__quantity">
												<div class="quantity">
													<div class="input-group" style="width: 120px !important; margin: 0 auto !important;">
														<div class="input-group-prepend">
															<button rowId="{{ $item->rowId }}" class="btn btn-outline-secondary kurangi-qty" type="button"><i class="fa fa-minus"></i></button>
														</div>
														<input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" disabled value="{{ $item->qty }}">
														<div class="input-group-append">
															<button rowId="{{ $item->rowId }}" class="btn btn-outline-secondary add-qty" type="button"><i class="fa fa-plus"></i></button>
														</div>
													</div>
														{{-- <div class="pro-qty">
																<input type="text" value="{{ $item->qty }}" disabled>
														</div> --}}
												</div>
										</td>
										<td class="shoping__cart__total">
												Rp. {{ number_format($item->subtotal, 0, '.', ',') }}
										</td>
								</tr>
								@endforeach
							</tbody>
					</table>
			</div>
	</div>
</div>
<div class="row" style="border: 1px solid #bcbcbc; border-radius: 5px; padding: 10px;">
	<div class="col-lg-12">
			<div class="shoping__cart__btns">
				<a href="{{ url('/') }}" class="primary-btn cart-btn">Lanjutkan Belanja</a>
				<a href="{{ url('shopping-cart/destroy') }}" class="primary-btn cart-btn cart-btn-right" style="background: #b42a2a !important; color: #ffffff !important;"><span class="fa fa-times"></span> Kosongkan Keranjang</a>
			</div>
	</div>
	<div class="col-lg-6">
		<div class="shoping__checkout">
			<div class="row">
				<div class="col-12">
					<h5>Destinasi Kota Pengiriman :</h5>
					<div class="form-group">
						<select name="destination" id="destination" class="form-control select2" data-placeholder="Pilih Kota Tujuan" style="width: 100% !important;" required>
							<option value=""></option>
							@foreach ($kota as $item)
								<option value="{{ $item->city_id }}" data-name="{{ $item->city_name }}">{{ $item->city_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group text-right">
						<button class="btn btn-success" id="cek-harga" style="border-radius: 0px;">Cek Harga</button>
					</div>
				</div>
				<div class="col-12">
					<table class="table">
						<thead>
							<tr>
								<th colspan="4">Jasa Pengiriman : &ensp; <span id="jasa">-</span></th>
							</tr>
							<tr>
								<th>Tipe</th>
								<th>Harga</th>
								<th>Estimasi</th>
								<th class="text-center">#</th>
							</tr>
						</thead>
						<tbody id="list-harga"> 
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div> 
	<div class="col-lg-6">
		<div class="shoping__checkout">
			<h5>Cart Total</h5>
			<ul>
				<li>Ongkos Kirim <span id="ongkir">Rp. 0</span></li>
				<li>Total <span id="total">Rp. 0</span></li>
			</ul>
			<form role="form" method="post" id="checkout" action="{{ url('shopping-cart/bayar')  }}" enctype="multipart/form-data">
				@csrf
				<div class="box-body">
						<div class="form-group">
								<label>Kota Pengiriman : </label>
								<input type="text" class="form-control" id="kota" name="kota" placeholder="Pilih Kota Pengiriman" readonly required>
						</div>
						<div class="form-group">
								<label>Jenis Pengiriman : </label>
								<input type="text" class="form-control" id="tipe" name="tipe" placeholder="Pilih Paket Pengiriman" readonly required>
						</div>
						<div class="form-group">
								<label>Penerima : </label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama Penerima..." value="{{ old('name') }}" required>
						</div>
						<div class="form-group">
								<label>Alamat Kirim : </label>
								<textarea name="address" id="address" class="form-control" placeholder="Masukan Alamat Kirim..." cols="26" rows="5"></textarea>
						</div>
						<div class="box-footer">
								<input type="hidden" name="endtotal" id="endtotal" required>
								<input type="hidden" name="kode" id="kode" required>
								<input type="hidden" name="ongkos" id="ongkos" required>
								<button type="submit" class="primary-btn" id="selesai" onclick="event.preventDefault(0);">Checkout</button>
						</div>
				</div>
			</form>
			{{-- <a href="{{ url('shopping-cart/checkout') }}" class="primary-btn">CHECKOUT</a> --}}
		</div>
	</div>
</div>
@endsection

@section('script')
{{-- <script src="{{ asset('frontend/js/datakota.min.js') }}"></script> --}}
<script src="{{ asset('frontend') }}/select2/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
			var texttotal = "{{ Cart::subtotal() }}";
			var ongkir = 0;
			$('#total').text("Rp. " + texttotal.replace(".00", ""));
			$('.add-qty').click(function(e){
					e.preventDefault();
					var rowId = $(this).attr('rowId');
					window.location.href = "{{ url('shopping-cart/update') }}"+'/'+rowId;
			});

			$('.kurangi-qty').click(function(e){
					e.preventDefault();
					var rowId = $(this).attr('rowId');
					window.location.href = "{{ url('shopping-cart/kurangi') }}"+'/'+rowId;
			});

			function numberFormat(nStr)
			{
					nStr += '';
					x = nStr.split('.');
					x1 = x[0];
					x2 = x.length > 1 ? '.' + x[1] : '';
					var rgx = /(\d+)(\d{3})/;
					while (rgx.test(x1)) {
						x1 = x1.replace(rgx, '$1' + '.' + '$2');
					}
					return x1 + x2;
			} 
		
			$('.select2').select2();

			$('#list-harga').on('click', '.pilih', function() {
				var desc = $(this).data('description');
				var cost = $(this).data('cost');
				var kota = $(this).data('kota');
				var service = $(this).data('service');

				$('#kota').val(kota);
				$("#tipe").val(desc + " (" + service + ")");
				ongkir = cost;
				var total = "{{ Cart::subtotal() }}";
				total = total.replace(",", "");
				total = total.replace(".00", "");
				console.log(total);
				total = parseFloat(total)+parseFloat(ongkir);
				console.log(total);
				$('#ongkir').text("Rp. " + numberFormat(ongkir));
				$('#total').text("Rp. " + numberFormat(total));
				$('#ongkos').val(cost);
				$('#endtotal').val(total);
				$('#name').focus();
			});

			$('#cek-harga').on('click', function() {
				var kota = $('.select2').val();
				var namakota = $('.select2').find(':selected').data('name');
				if (kota == '') {
					swal("Perhatian", 'Pilih Destinasi Kota Pengiriman !', 'warning');
				} else {
					$.ajax({
						method: 'POST',
						url: "{{ route('cek_ongkir') }}",
						data: {
							_token: "{{ csrf_token() }}",
							city_id: kota,
						},
						success: function(res) {
							console.log(res.rajaongkir.results[0]);
							var jasa = res.rajaongkir.results[0].name;
							var kode = res.rajaongkir.results[0].code;
							$('#jasa').text(jasa);
							$('#kode').val(kode);
							var harga = res.rajaongkir.results[0].costs;
							$('#list-harga tr').remove();
							harga.forEach(item => {
								console.log(item);
								var cost = numberFormat(item.cost[0].value);
								$('#list-harga').append(`
								<tr>
									<td style="padding-top: 16px;">${item.service}</td>
									<td style="padding-top: 16px;">Rp. ${cost}</td>
									<td style="padding-top: 16px;">${item.cost[0].etd} Hari</td>
									<td class="text-center">
										<button class="btn btn-sm btn-outline-info pilih" data-kota="${namakota}" data-description="${item.description}" data-service="${item.service}" data-cost="${item.cost[0].value}"><i class="fa fa-check"></i></button>
									</td>
								</tr>
								`);
							});
						}, 
					});
				}
			});

			$('#selesai').on('click', function() {
				var fail = true;
				var fm = '';
				var fc = '';
				var penerima = $('#name').val();
				var address = $('#address').val();
				
				if (address == '') { fail = false; fm = "Silahkan Masukan Alamat Kirim !"; fc = '#address' }
				if (penerima == '') { fail = false; fm = "Silahkan Masukan Penerima !"; fc = '#name' }
				if (ongkir == 0) { fail = false; fm = "Silahkan Pilih Jasa Pengiriman !"; fc = '.select2' }

				if (fail == false) {
					swal("Peringatan", fm, "warning");
					$(fc).focus();
					$('html,body').animate({
						scrollTop: $(fc).offset().top},
						'slow'); 
				} else {
					$('#checkout').submit();
				}
			});
	});
</script>
{{-- <script type="text/javascript" src="//rajaongkir.com/script/widget.js"></script> --}}
@endsection