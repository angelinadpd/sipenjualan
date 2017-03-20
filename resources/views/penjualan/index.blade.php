@extends('layout.default')
@section('content'){{ Session::get('message') }}


<div class="row">
<h1>Data Penjualan</h1>
<a href="{{route('penjualan.create')}}" class="pull-left btn btn-success" id="create-penjualan" style="margin-right: 5px; margin-bottom: 20px">
  <i class="icon-plush icon-white"></i>Tambah Data</a><br><br><br>
<div class="table-responsive">
  <table class="table table-bordered table-hover tble-striped">
    <thead>
      <tr>
    		<th>ID Penjualan</th>
    		<th>Nota</th>
    		<th>Tanggal</th>
    		<th>Nama Pembeli</th>
        <th>Type Barang</th>
        <th>Qty</th>
        <th>Amount</th>
        <th>Total</th>
        <th>Action</th>
    	</tr>
    </thead>

    @foreach($penjualans as $penjualan)
    <tr>
       <td> {{ $penjualan->idpenjualan}} </td>
       <td> {{ $penjualan->nota}} </td>
       <td> {{ $penjualan->tgl}} </td>
       <td> {{ $penjualan->nama}} </td>
       <td> {{ $penjualan->type}} </td>
       <td> {{ $penjualan->qty}} </td>
       <td> {{ $penjualan->amount}} </td>
       <td> {{ $penjualan->total}} </td>
       <td>
         		<a href="/penjualan/{{$penjualan->idpenjualan}}/edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit</a>
            <a href="/penjualan/{{$penjualan->idpenjualan}}" class="btn btn-danger" id="alertHapus"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus</a>
        </td>
      </tr>
@endforeach
</tbody>
</table>
          {!! $penjualans->links() !!} 
  </div>  
@endsection