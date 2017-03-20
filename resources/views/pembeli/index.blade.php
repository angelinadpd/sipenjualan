@extends('layout.default')
@section('content')
{{ Session::get('message') }}


<div class="row">
<h1>Data Pembeli</h1>
<a href="{{route('pembeli.create')}}" class="pull-left btn btn-success" id="create-pembeli" style="margin-right: 5px; margin-bottom: 20px">
  <i class="icon-plush icon-white"></i>Tambah Data</a><br><br><br>
<div class="table-responsive">
  <table class="table table-bordered table-hover tble-striped">
    <thead>
      <tr>
    		<th>ID Pembeli</th>
    		<th>Nama Pembeli</th>
    		<th>Alamat</th>
    		<th>Telp</th>
        <th>Action</th>
    	</tr>
    </thead>

    @foreach($pembelis as $pembeli)
    <tr>
       <td> {{ $pembeli->idpembeli}} </td>
       <td> {{ $pembeli->nama}} </td>
       <td> {{ $pembeli->alamat}} </td>
       <td> {{ $pembeli->telp}} </td>
       <td>
         		<a href="/pembeli/{{$pembeli->idpembeli}}/edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit</a>
              <a href="/pembeli/{{$pembeli->idpembeli}}" class="btn btn-danger" id="alertHapus"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus</a>
        </td>
    </tr>        
@endforeach
</tbody>
</table>
          {!! $pembelis->links() !!} 
  </div>  
@endsection