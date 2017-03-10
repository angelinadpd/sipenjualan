@extends('layout.default')
@section('content')
{{ Session::get('message') }}

<div class="row">
<h1>Laporan Harian</h1>
<div class="table-responsive">
  <table class="table table-bordered table-hover tble-striped">
    <thead>
      <tr>
        <th>ID Laporan</th>
    		<th>Kode</th>
    		<th>No. SO</th>
    		<th>Tanggal Pemesanan</th>
    		<th>Nama Barang</th>
        <th>No. Do</th>
        <th>Tanggal Pembelian</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Total</th>
        <th>Status</th>
    	</tr>
    </thead>

    @foreach($laporanpembelians as $laporanpembelian)
    <tr>
       <td> {{ $laporanpembelian->idlaporanpembelian}} </td>
       <td> {{ $laporanpembelian->kode}} </td>
       <td> {{ $laporanpembelian->noso }} </td>
       <td> {{ $laporanpembelian->tglpesan}} </td>
       <td> {{ $laporanpembelian->nama}} </td>
       <td> {{ $laporanpembelian->nodo}} </td>
       <td> {{ $laporanpembelian->tglrealisasi}} </td>
       <td> {{ $laporanpembelian->qty}} </td>
       <td> {{ $laporanpembelian->price}} </td>
       <td> {{ $laporanpembelian->total}} </td>
       <td> {{ $laporanpembelian->status}} </td>
    </tr>        
@endforeach
<tbody>
  <table>
        <tr>
            <td width="600"></td>
            <td>Padang, </td>
        </tr>
        <tr height="50">
            <td width="500"></td>
            <td></td>
        </tr>
        <tr width="700">
            <td></td>
            <td>PIMPINAN</td>
        </tr>
    </table>

</tbody>
</table>
          {!! $laporanpembelians->links() !!} 
  </div>  
@endsection