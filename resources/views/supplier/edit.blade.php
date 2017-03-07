@extends('layout.default')
@section('content')
{{ Session::get('message') }}


<h1>Edit Supplier</h1>
<form class="" action="/supplier/{{$supplier->idsupplier}}" method="post">
	<p>Nama Supplier
	<input type="text" name="nama" value="{{ $supplier->nama }}"></p><br>

	<p>Alamat
	<input type="text" name="alamat" value="{{ $supplier->alamat }}"></p><br>

	<p>Telp
	<input type="text" name="telp" value="{{ $supplier->telp }}"></p><br>

	<input type="hidden" name="_method" value="put">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Save</button>

</form>
@endsection