@extends('layout.default')
@section('content')
{{ Session::get('message') }}


<h1>Edit Pembelian</h1>
<form class="" action="/realisasi/{{$realisasi->idrealisasi}}" method="post">
	<p>ID Pesan
	<select name="idpesan">
		<option> --Pilih ID Pemesanan-- </option>
		@foreach($pesanbarang as $pesanbarang)
			<option value="{{ $pesanbarang->idpesan }}"> {{ $pesanbarang->kode }} </option>
		@endforeach
	</select>

	<p>Tanggal
	<input type="date" name="tgl" value="{{ $realisasi->tgl }}"></p><br>

	<p>Price
	<input type="text" name="price" value="{{ $realisasi->price }}"></p><br>

	<p>Qty
	<input type="text" name="qty" value="{{ $realisasi->qty }}"></p><br>

	<p>Status
	<select name="status" value="{{ $realisasi->status }}">
		<option> --Pilih status-- </option>
		<option> Pesan </option>
		<option> Masuk </option>
		<option> Batal </option>
	</select>
	</p>

	<input type="hidden" name="_method" value="put">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Save</button>

</form>
@endsection