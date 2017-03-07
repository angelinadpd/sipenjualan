@extends('layout.default')
@section('content')
{{ Session::get('message') }}

<h1>Create Pembeli</h1>
<form class="" action="/pembeli" method="post">
	<p>Nama Pembeli
	<input type="text" name="nama" value="">
	{{ ($errors->has('nama')) ? $errors->first('nama') : '' }}</p><br>

	<p>Alamat
	<input type="text" name="alamat" value="">
	{{ ($errors->has('alamat')) ? $errors->first('alamat') : '' }}</p><br>

	<p>Telp
	<input type="text" name="telp" value="">
	{{ ($errors->has('telp')) ? $errors->first('telp') : '' }}</p><br>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Post</button>
    <button class="btn btn-success" type="reset" name="reset">Reset</button>
</form>
@endsection