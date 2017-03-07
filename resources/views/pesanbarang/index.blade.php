@extends('layout.default')
@section('content')
{{ Session::get('message') }}


<div class="row">
<h1>Data Pemesanan</h1>
<a href="{{route('pesanbarang.create')}}" class="pull-left btn btn-success" id="create-pesanbarang" style="margin-right: 5px; margin-bottom: 20px">
  <i class="icon-plush icon-white"></i>Tambah Data</a><br><br><br>
<div class="table-responsive">
  <table class="table table-bordered table-hover tble-striped">
    <thead>
      <tr>
    		<th>ID Pemesanan</th>
    		<th>Kode pesanbarang</th>
    		<th>No. SO</th>
    		<th>Tanggal</th>
        <th>ID Barang</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Hapus</th>
    	</tr>
    </thead>

    @foreach($pesanbarangs as $pesanbarang)
    <tr>
       <td> {{ $pesanbarang->idpesan}} </td>
       <td> {{ $pesanbarang->kode}} </td>
       <td> {{ $pesanbarang->noso}} </td>
       <td> {{ $pesanbarang->tgl}} </td>
       <td> {{ $pesanbarang->nama}} </td>
       <td> {{ $pesanbarang->status}} </td>
       <td>
         		<a href="/pesanbarang/{{$pesanbarang->idpesan}}" class="btn btn-xs btn-success"><i class="fa fa-pencil-square-o"></i> </a>
       </td>
       <td>
            <form class="" action="/pesanbarang/{{$pesanbarang->idpesan}}" name="name" method="post">
              <button class="btn btn-xs btn-warning"><i class="fa fa-trash"></i></button>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="delete">
            </form>
        </td>
      </tr>

@endforeach
</tbody>
</table>
          {!! $pesanbarangs->links() !!} 
  </div>  
@endsection