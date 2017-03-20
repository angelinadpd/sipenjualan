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
        <th>Action</th>
    	</tr>
    </thead>

    @foreach($suppliers as $supplier)
    <tr>
       <td> {{ $supplier->idsupplier}} </td>
       <td> {{ $supplier->nama}} </td>
       <td> {{ $supplier->alamat}} </td>
       <td> {{ $supplier->telp}} </td>
       <td>
         		<a href="/supplier/{{$supplier->idsupplier}}/edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit</a>
              <a href="/supplier/{{$supplier->idsupplier}}" class="btn btn-danger" id="alertHapus"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus</a>
        </td>
      </tr>
@endforeach
</tbody>
</table>
          {!! $suppliers->links() !!} 
  </div>  
@endsection