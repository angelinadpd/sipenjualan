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
        <th>Edit</th>
        <th>Hapus</th>
    	</tr>
    </thead>

    @foreach($pembelis as $pembeli)
    <tr>
       <td> {{ $pembeli->idpembeli}} </td>
       <td> {{ $pembeli->nama}} </td>
       <td> {{ $pembeli->alamat}} </td>
       <td> {{ $pembeli->telp}} </td>
       <td>
         		<a href="/pembeli/{{$pembeli->idpembeli}}" class="btn btn-xs btn-success"><i class="fa fa-pencil-square-o"></i> </a>
       </td>
       <td>
            <form class="" action="/pembeli/{{$pembeli->idpembeli}}" name="name" method="post">
              <button class="btn btn-xs btn-warning"><i class="fa fa-trash"></i></button>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="delete">
            </form>
        </td>
    </tr>        
@endforeach
</tbody>
</table>
          {!! $pembelis->links() !!} 
  </div>  
@endsection