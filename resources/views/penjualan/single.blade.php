@extends('layout.default')
@section('content')
{{ Session::get('message') }}

<h1>Edit Penjualan</h1>
<form class="" action="/penjualan/{{$penjualan->idpenjualan}}"  method="post">
	<p>Tanggal
	<input type="date" name="tgl" value="{{ $penjualan->tgl }}"></p><br>

	<p>ID Pembeli
	<select name="idpembeli">
		<option> --Pilih ID Pembeli-- </option>
		@foreach($pembeli as $pembeli)
			<option value="{{ $pembeli->idpembeli }}"> {{ $pembeli->nama }} </option>
		@endforeach
	</select>

	<p>ID Barang
	<select name="idbarang">
		<option> --Pilih ID Barang-- </option>
		@foreach($barang as $barang)
			<option value="{{ $barang->idbarang }}"> {{ $barang->type }} </option>
		@endforeach
	</select>

	<p>Qty
	<input type="text" name="qty" value="{{ $penjualan->qty }}"> </p><br>

	<p>Amount
	<input type="text" name="amount" value="{{ $penjualan->amount }}"> </p><br>

	<p>Total
	<input type="text" name="total" value="{{ $penjualan->total }}"> </p><br>

	<input type="hidden" name="_method" value="put">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Save</button>
</form>
@endsection