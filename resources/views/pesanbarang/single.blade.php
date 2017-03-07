@extends('layout.default')
@section('content')
{{ Session::get('message') }}


<h1>Edit Pemesanan</h1>
<form class="" action="/pesanbarang/{{$pesanbarang->idpesan}}" method="post">
	<p>Kode
	<input type="text" name="kode" value="{{ $pesanbarang->kode }}"></p><br>

	<p>Tanggal
	<input type="date" name="tgl" value="{{ $pesanbarang->tgl }}"></p><br>

	<p>ID Barang
	<select name="idbarang">
		<option> --Pilih ID Barang-- </option>
		@foreach($barang as $barang)
			<option value="{{ $barang->idbarang }}"> {{ $barang->nama }} </option>
		@endforeach
	</select>

	<p>Status
	<input type="text" name="status" value="{{ $pesanbarang->status }}"></p><br>

	<input type="hidden" name="_method" value="put">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Save</button>
</form>
@endsection