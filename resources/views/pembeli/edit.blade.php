@extends('layout.default')
@section('content')
{{ Session::get('message') }}

<h1>Edit Pembeli</h1>
<form class="" action="/pembeli/{{$pembeli->idpembeli}}"  method="post">
	<p>Nama Pembeli
	<input type="text" name="nama" value="{{ $pembeli->nama }}"></p><br>

	<p>Alamat
	<input type="text" name="alamat" value="{{ $pembeli->alamat }}"></p><br>

	<p>Telp
	<input type="text" name="telp" value="{{ $pembeli->telp }}"></p><br>

	<input type="hidden" name="_method" value="put">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Save</button>
</form>
@endsection