@extends('layout.default')
@section('content')
{{ Session::get('message') }}


<h1>Create Penjualan</h1>
<form class="" action="/penjualan" method="post">
	<p>Tanggal
	<input type="date" name="tgl" value="">
	{{ ($errors->has('tgl')) ? $errors->first('tgl') : '' }}</p><br>

	<p>ID Pembeli
	<select name="idpembeli">
		<option> --Pilih Nama Pembeli-- </option>
		@foreach($pembeli as $pembeli)
			<option value="{{ $pembeli->idpembeli }}"> {{ $pembeli->nama }} </option>
		@endforeach
	</select>
	{{ ($errors->has('idpembeli')) ? $errors->first('idpembeli') : '' }}</p><br>

	<p>ID Barang
	<select name="idbarang">
		<option> --Pilih Type Barang-- </option>
		@foreach($barang as $barang)
			<option value="{{ $barang->idbarang }}"> {{ $barang->type }} </option>
		@endforeach
	</select>
	{{ ($errors->has('idbarang')) ? $errors->first('idbarang') : '' }}</p><br>

	<p>Qty
	<input type="text" name="qty" value="">
	{{ ($errors->has('qty')) ? $errors->first('qty') : '' }}</p><br>

	<p>Amount
	<input type="text" name="amount" value="">
	{{ ($errors->has('amount')) ? $errors->first('amount') : '' }}</p><br>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Post</button>
    <button class="btn btn-success" type="reset" name="reset">Reset</button>
</form>
@endsection