@extends('layout.default')
@section('content')

<div class="row">
<h1>Data Barang</h1>
<a href="{{route('barang.create')}}" class="pull-left btn btn-success" id="create-barang" style="margin-right: 5px; margin-bottom: 20px">
  <i class="icon-plush icon-white"></i>Tambah Data</a><br><br><br>
<div class="table-responsive">
  <table class="table table-bordered table-hover tble-striped" id="tabelbarang">
    <thead>
    	<tr>
    		<th>ID Barang</th>
    		<th>Type Barang</th>
    		<th>Nama Barang</th>
    		<th>Price</th>
    		<th>DPP</th>
    		<th>PPN</th>
    		<th>Stok Barang</th>
        <th>Action</th>
    	</tr>
      {{ csrf_field() }}
    </thead>

      @foreach($barangs as $barang)
      <tr class="item{{$barang->idbarang}}">
         <td> {{ $barang->idbarang}} </td>
         <td> {{ $barang->type}} </td>
         <td> {{ $barang->nama}} </td>
         <td> {{ $barang->price}} </td>
         <td> {{ $barang->dpp}} </td>
         <td> {{ $barang->ppn}} </td>
         <td> {{ $barang->stok}} </td>
         <td>
           		<a href="/barang/{{$barang->idbarang}}/edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit</a>
              <a href="/barang/{{$barang->idbarang}}" class="btn btn-danger" id="alertHapus"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus</a>
             <!-- <a href='#' data-id=' {$idbarang}' class='delete-it'>Delete</a> -->
      
         </td>
  </tr>
@endforeach
</tbody>
</table>
  </div>
</div> 

<!-- <div class="modal fade" id ="myModal"  role ="dialog">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 500px; margin : 0 auto;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss ="modal">
                <span aria-hidden ="true">&times;</span>
            </button>
            <h4 class="modal-title">Konfirmasi</h4>
        </div>

        <div class="modal-body">
          <div class="deleteContent">
              Anda yakin ingin menghapus data ini <span class="title"></span> ?
              <span class="hidden id"></span>
          </div>

          <div class="modal-footer">
              <button type ="button" class="btn actionBtn" data-dismiss ="modal">
                  <span id="footer_action_button" class="glyphicon"></span>Delete
              </button>
              <button type="button" class=" btn btn-warning" data-dismiss ="modal"><span class="glyphicon glyphicon-remove"></span> Close
              </button>
          </div>
        </div>
    </div>
  </div>
</div>       -->
@endsection
