@extends('layout.default')
@section('content')
{{ Session::get('message') }}

<h1>Edit Barang</h1>
<form class="" action="/barang/{{$barang->idbarang}}"  method="post">
    <p>Type Barang
	<input type="text" name="type" value="{{ $barang->type }}"></p><br>

	<p>Nama Barang
	<input type="text" name="nama" value="{{ $barang->nama }}"></p><br>

	<p>Price
	<input type="text" name="price" value="{{ $barang->price }}"></p><br>

	<p>Stok
	<input type="text" name="stok" value="{{ $barang->stok }}"></p><br><br>

	<input type="hidden" name="_method" value="put">	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Save</button>
</form>
@endsection