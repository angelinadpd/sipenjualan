@extends('layout.default')
@section('content')
{{ Session::get('message') }}

<div class="row">
<h1 align="center">Laporan Mingguan</h1>

<p>Tanggal
  <input type="date" name="date" value=""></p>
<a href="/indexmingguan" class="pull-left btn btn-success" id="cari-laporan-mingguan" style="margin-right: 5px; margin-bottom: 20px">
  <i class="fa fa-search icon-white"></i>Cari</a><br><br><br>

<div class="table-responsive">
  <table class="table table-bordered table-hover tble-striped">
    <thead>
      <tr>
        <th>ID Laporan</th>
        <th>Tanggal</th>
    		<th>Nota</th>
    		<th>Nama Pembeli</th>
    		<th>Qty</th>
    		<th>ID Barang</th>
        <th>Type</th>
        <th>Price</th>
        <th>DPP</th>
        <th>PPN</th>
        <th>Amount</th>
        <th>Total</th>
    	</tr>
    </thead>

    @foreach($laporanpenjualans as $laporanpenjualan)
    <tr>
       <td> {{ $laporanpenjualan->idlaporanpenjualan}} </td>
       <td> {{ $laporanpenjualan->tgl}} </td>
       <td> {{ $laporanpenjualan->nota }} </td>
       <td> {{ $laporanpenjualan->nama }} </td>
       <td> {{ $laporanpenjualan->qty}} </td>
       <td> {{ $laporanpenjualan->idbarang}} </td>
       <td> {{ $laporanpenjualan->type}} </td>
       <td> {{ $laporanpenjualan->price}} </td>
       <td> {{ $laporanpenjualan->dpp}} </td>
       <td> {{ $laporanpenjualan->ppn}} </td>
       <td> {{ $laporanpenjualan->amount}} </td>
       <td> {{ $laporanpenjualan->total}} </td>
    </tr>        
@endforeach
</table>
          {!! $laporanpenjualans->links() !!} 
  </div>  
@endsection