@extends('layout.default')
@section('content')

{{ Session::get('message') }}


<div class="row">
<h1>Data Barang</h1>
<a href="{{route('barang.create')}}" class="pull-left btn btn-success" id="create-barang" style="margin-right: 5px; margin-bottom: 20px">
  <i class="icon-plush icon-white"></i>Tambah Data</a><br><br><br>
<div class="table-responsive">
  <table class="table table-bordered table-hover tble-striped">
    <thead>
    	<tr>
    		<th>ID Barang</th>
    		<th>Type Barang</th>
    		<th>Nama Barang</th>
    		<th>Price</th>
    		<th>DPP</th>
    		<th>PPN</th>
    		<th>Stok Barang</th>
        <th>Edit</th>
        <th>Hapus</th>
    	</tr>
    </thead>

      @foreach($barangs as $barang)
      <tr>
         <td> {{ $barang->idbarang}} </td>
         <td> {{ $barang->type}} </td>
         <td> {{ $barang->nama}} </td>
         <td> {{ $barang->price}} </td>
         <td> {{ $barang->dpp}} </td>
         <td> {{ $barang->ppn}} </td>
         <td> {{ $barang->stok}} </td>
         <td>
           		<a href="/barang/{{$barang->idbarang}}" class="btn btn-xs btn-success"><i class="fa fa-pencil-square-o"></i> </a>
         </td>
         <td>
              <form class="" action="/barang/{{$barang->idbarang}}" name="name" method="post">
                <button name="" class="btn btn-xs btn-warning"> <i class="fa fa-trash"></i> </button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete">
              </form> 
                  
         </td>
  </tr>
@endforeach
</tbody>
</table>
          {!! $barangs->links() !!} 
  </div>
</div>  
@endsection