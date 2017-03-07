@extends('layout.default')
@section('content')
{{ Session::get('message') }}


<h1>Create Barang</h1>
<form class="" action="/barang" method="post">
    <p>Type Barang
	<input type="text" name="type" value="">
	{{ ($errors->has('type')) ? $errors->first('type') : '' }}</p><br>

	<p>Nama Barang
	<input type="text" name="nama" value="">
	{{ ($errors->has('nama')) ? $errors->first('nama') : '' }}</p><br>

	<p>Price
	<input type="text" name="price" value="">
	{{ ($errors->has('price')) ? $errors->first('price') : '' }}</p><br>

	<!--<p>DPP
	<input type="text" name="dpp" value="">
	{{ ($errors->has('dpp')) ? $errors->first('dpp') : '' }}</p><br>

	<p>PPN
	<input type="text" name="ppn" value="">
	{{ ($errors->has('ppn')) ? $errors->first('ppn') : '' }}</p><br>-->

	<p>Stok
	<input type="text" name="stok" value="">
	{{ ($errors->has('stok')) ? $errors->first('stok') : '' }}</p><br><br>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Post</button>
    <button class="btn btn-success" type="reset" name="reset">Reset</button>
</form>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@endsection