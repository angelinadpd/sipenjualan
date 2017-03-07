@extends('layout.default')
@section('content')
{{ Session::get('message') }}


<h1>Create Pembelian</h1>
<form class="" action="/realisasi" method="post">
	<p>ID Pesan
	<select name="idpesan">
		<option> --Pilih ID Pemesanan-- </option>
		@foreach($pesanbarang as $pesanbarang)
			<option value="{{ $pesanbarang->idpesan }}"> {{ $pesanbarang->kode }} </option>
		@endforeach
	</select>
	{{ ($errors->has('idpesan')) ? $errors->first('idpesan') : '' }}</p><br>

	<p>Tanggal
	<input type="date" name="tgl" value="">
	{{ ($errors->has('tgl')) ? $errors->first('tgl') : '' }}</p><br>

	<p>Price
	<input type="text" name="price" value="">
	{{ ($errors->has('price')) ? $errors->first('price') : '' }}</p><br>

	<p>Qty
	<input type="text" name="qty" value="">
	{{ ($errors->has('qty')) ? $errors->first('qty') : '' }}</p><br>

	<p>Total
	<input type="text" name="total" value="">
	{{ ($errors->has('total')) ? $errors->first('total') : '' }}</p><br>

	<p>Status
	<input type="text" name="status" value="">
	{{ ($errors->has('status')) ? $errors->first('status') : '' }}</p><br>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Post</button>
    <button class="btn btn-success" type="reset" name="reset">Reset</button>
</form>
@endsection