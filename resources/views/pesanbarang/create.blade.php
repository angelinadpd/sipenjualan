@extends('layout.default')
@section('content')
{{ Session::get('message') }}


<h1>Create Pemesanan</h1>
<form class="" action="/pesanbarang" method="post">
	<p>Kode
	<input type="text" name="kode" value="">
	{{ ($errors->has('kode')) ? $errors->first('kode') : '' }}</p><br>

	<p>Tanggal
	<input type="date" name="tgl" value="">
	{{ ($errors->has('tgl')) ? $errors->first('tgl') : '' }}</p><br>

	<p>Nama Barang
	<select name="idbarang">
		<option> --Pilih Nama Barang-- </option>
		@foreach($barang as $barang)
			<option value="{{ $barang->idbarang }}"> {{ $barang->nama }} </option>
		@endforeach
	</select>
    {{ ($errors->has('idbarang')) ? $errors->first('idbarang') : '' }}</p><br>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Post</button>
    <button class="btn btn-success" type="reset" name="reset">Reset</button>
</form>
@endsection