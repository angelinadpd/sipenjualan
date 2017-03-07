@extends('layout.default')
@section('content')
{{ Session::get('message') }}

<div class="row">
<h1>Data Supplier</h1>
<a href="{{route('supplier.create')}}" class="pull-left btn btn-success" id="create-supplier" style="margin-right: 5px; margin-bottom: 20px">
  <i class="icon-plush icon-white"></i>Tambah Data</a><br><br><br>
<div class="table-responsive">
  <table class="table table-bordered table-hover tble-striped">
    <thead>
      <tr>
    		<th>ID Supplier</th>
    		<th>Nama Supplier</th>
    		<th>Alamat</th>
    		<th>Telp</th>
        <th>Edit</th>
        <th>Hapus</th>
    	</tr>
    </thead>

    @foreach($suppliers as $supplier)
    <tr>
       <td> {{ $supplier->idsupplier}} </td>
       <td> {{ $supplier->nama}} </td>
       <td> {{ $supplier->alamat}} </td>
       <td> {{ $supplier->telp}} </td>
       <td>
         		<a href="/supplier/{{$supplier->idsupplier}}" class="btn btn-xs btn-success"><i class="fa fa-pencil-square-o"></i> </a>
       </td>
       <td>
            <form class="" action="/supplier/{{$supplier->idsupplier}}" name="name" method="post">
              <button class="btn btn-xs btn-warning"><i class="fa fa-trash"></i></button>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="delete">
            </form>
        </td>
      </tr>
@endforeach
</tbody>
</table>
          {!! $suppliers->links() !!} 
  </div>  
@endsection