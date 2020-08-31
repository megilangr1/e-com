<style>
	#order {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
	}

	#order td, #order th {
			border: 1px solid #ddd;
			padding: 8px;
	}

	#order tr:nth-child(even){background-color: #f2f2f2;}

	#order tr:hover {background-color: #ddd;}

	#order th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #4CAF50;
			color: white;
	}
</style>
<table id="order" width="100%">
	<tr>
		<td width="25%">Tanggal Transaksi</td>
		<td width="5%">:</td>
		<td>{{ date('d M Y | H : i : s', strtotime($header->created_at)) }}</td>
	</tr>
	<tr>
		<td width="25%">Penginput</td>
		<td width="5%">:</td>
		<td>{{ $header->user->name }}</td>
	</tr>
</table>
<hr>
<table id="order" width="100%">
	<thead>
		<tr>
				<th>Produk</th>
				<th>Jumlah</th>
				<th>Harga</th>
		</tr>
	</thead>
	@foreach($header->detail as $item)
		<tbody>
			<tr>
					<td>{{ $item->product->name }}</td>
					<td>{{ $item->qty }}</td>
					<td>Rp. {{ number_format($item->price, 0) }}</td>
			</tr>
		</tbody>
	@endforeach
	<tfoot>
		<tr>
			<td colspan="2" style="text-align: right;">Total : </td>
			<td>Rp. {{ number_format($header->total, 0) }}</td>
		</tr>
	</tfoot>
</table>