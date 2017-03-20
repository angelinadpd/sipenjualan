@extends('layout.default')
@section('content')
{{ Session::get('message') }}


<h1>Edit Pemesanan</h1>
<form class="" action="/pesanbarang/{{$pesanbarang->idpesan}}" method="post">
	<p>Kode
	<input type="text" name="kode" value="{{ $pesanbarang->kode }}"></p><br>

	<p>Tanggal
	<input type="date" name="tgl" value="{{ $pesanbarang->tgl }}"></p><br>

	<p>Nama Barang
	<select name="idbarang">
		<option> --Pilih Nama Barang-- </option>
		@foreach($barang as $barang)
			<option value="{{ $pesanbarang->idbarang }}"> {{ $barang->nama }} </option>
		@endforeach
	</select>
	</p>

	<input type="hidden" name="_method" value="put">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Save</button>

</form>
@endsection