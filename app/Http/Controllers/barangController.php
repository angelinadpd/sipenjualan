<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\barang;
use App\Http\Controllers\Controllers;
use Response;
use Validator;

class barangController extends Controller
{
    public function index()
    {
        //$barangs = barang::all();
        $barangs = DB::table('barang')->paginate(5);
        return view('barang.index', ['barangs' => $barangs]);
    }
    public function create()
    {
        return view('barang.create');

    }
    public function store(Request $request)
    {
        $price = $request->price;
        $ppn = $price*0.1;
        $dpp = $price+$ppn;

    // $this->validate($request, [
    //     'type'   => $request->type,
    //     'nama'   => $request->nama,
    //     'price'  => $request->price,
    //     // 'dpp'    => $dpp,
    //     // 'ppn'    => $ppn,
    //     'stok'   => $request->stok,
    //     ]);

        $barang = new barang;
        $barang->type   = $request->type;
        $barang->nama   = $request->nama;
        $barang->price  = $request->price;
        $barang->dpp    = $dpp;
        $barang->ppn    = $ppn;
        $barang->stok   = $request->stok;
        $barang->save();

        return redirect('barang')->with('message','Simpan data barang sukses !');
    }

    public function show($idbarang)//DELETE
    {
        $barang = barang::where('idbarang', '=',$idbarang);
        $barang->delete();
        return redirect('barang');

        return view('barang.single')->with('barang',$barang);
    }
    public function edit($barang)
    {
        //$barang=barang::find($idbarang);
        $barang=barang::where('idbarang',$barang)->first();
        if(!$barang){
            abort(404);
        }
        return view('barang.edit')->with('barang',$barang);
    }
    public function update(Request $request, $idbarang)
    {
        $price = $request->price;
        $ppn = $price*0.1;
        $dpp = $price+$ppn;

        $this->validate($request, [
         'type' => 'required',
         'nama' => 'required',
         'price'=> 'required',
         //'dpp'  => 'required',
         //'ppn'  => 'required',
         'stok' => 'required',
    ]);
        $barang = barang::where('idbarang', '=',$idbarang);

	    $paramsUpdate = [
		'type'   => $request->type,
		'nama'   => $request->nama,
		'price'  => $request->price,
		'dpp'    => $dpp,
		'ppn'    => $ppn,
		'stok'   => $request->stok,
	];
        $barang->update($paramsUpdate);

        return redirect('barang')->with('message','Edit data barang sukses !');
    }
    public function destroy($idbarang)
    {
        $barang = barang::where('idbarang', '=',$idbarang);
        $barang->delete();
        return redirect('barang')->with('message','Hapus data barang sukses !'); 
    }

}
    