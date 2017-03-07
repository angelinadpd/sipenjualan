<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\barang;
use App\Http\Controllers\Controllers;

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
        $this->validate($request, [
         /*'type' => 'required',
         'nama' => 'required',
         'price'=> 'required',
         //'dpp'  => 'required',
         //'ppn'  => 'required',
         'stok' => 'required',*/
    ]);

        $barang = new barang;
        $barang->type   = $request->type;
        $barang->nama   = $request->nama;
        $barang->price  = $request->$price;
        $barang->dpp    = $dpp;
        $barang->ppn    = $pnn;
        $barang->stok   = $request->stok;
        $barang->save();

        return redirect('barang')->with('message','Simpan data barang sukses !');

        //
        $price = 0;
        $idbarang = Input::get('price');
        foreach ($price as $price => $price) {
            $ppn = $value->$price*0.1;
            $dpp = $value->$price*$ppn;
        }
    }
    public function show($barang)
    {
        //$barang=barang::find($idbarang);
        $barang=barang::where('idbarang',$barang)->first();
        if(!$barang){
            abort(404); 
        }
        return view('barang.single')->with('barang',$barang);
    }
    public function edit($idbarang)
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
		//'dpp'    => $request->dpp,
		//'ppn'    => $request->ppn,
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
    