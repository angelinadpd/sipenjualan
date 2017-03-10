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
        <th>Edit</th>
        <td>Hapus</td>
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
         		<a href="/penjualan/{{$penjualan->idpenjualan}}" class="btn btn-xs btn-success"><i class="fa fa-pencil-square-o"></i> </a>
       </td>
       <td>
            <form class="" action="/penjualan/{{$penjualan->idpenjualan}}" name="name" method="post">
              <button class="btn btn-xs btn-warning"><i class="fa fa-trash"></i></button>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="delete">
            </form>
        </td>
      </tr>
@endforeach
</tbody>
</table>
          {!! $penjualans->links() !!} 
  </div>  
@endsection