<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\pesanbarang;
use App\barang;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;

class pesanbarangController extends Controller
{
    public function index()
    {
        //$pesanbarangs = pesanbarang::all();
        $pesanbarangs = DB::table('pesanbarang')->leftjoin('barang', 'pesanbarang.idbarang','=','barang.idbarang')
            ->select('pesanbarang.idpesan','pesanbarang.kode','pesanbarang.noso','pesanbarang.tgl','barang.nama','pesanbarang.status')
            ->paginate(5);
        return view('pesanbarang.index', ['pesanbarangs' => $pesanbarangs]);                                          
    }

    public function create()
    {
       $barang=DB::table('barang')->get();
        return view('pesanbarang.create',['barang'=>$barang]);
    }

    public function store(Request $request)
    {
        $pesanbarang = new pesanbarang;
        $pesanbarang->kode = $request->kode;
        $pesanbarang->noso = str_random(8);
        $pesanbarang->tgl = $request->tgl;
        $pesanbarang->idbarang = $request->idbarang;
        $pesanbarang->status = "Pesan";
        $pesanbarang->save();

        return redirect('pesanbarang')->with('message','Simpan data pemesanan sukses !');
    }

    public function show($idpesan)
    {
        //$pesanbarang=pesanbarang::find($idpesan);
        $pesanbarang = pesanbarang::where('idpesan', '=',$idpesan);
        $pesanbarang->delete();
        return redirect('pesanbarang');
    }

    public function edit($pesanbarang)
    {
        $barang= DB::table('barang')->get();
        $pesanbarang=pesanbarang::where('idpesan',$pesanbarang)->first();
        if(!$pesanbarang){
            abort(404);
        }
        return view('pesanbarang.edit',[
            'pesanbarang' => $pesanbarang,
            'barang' => $barang
        ]);
    }

    public function update(Request $request, $idpesan)
    {
         $this->validate($request, [
            'kode'      => 'required',
            'tgl'       => 'required',
            'idbarang'  => 'required',
        ]);

       $pesanbarang = pesanbarang::where('idpesan', '=',$idpesan);

        $paramsUpdate = [
            'kode'      => $request->kode,
            'tgl'       => $request->tgl,
            'idbarang'  => $request->idbarang,
        ];
        
        $pesanbarang->update($paramsUpdate);

        return redirect('pesanbarang')->with('message','Update data pemesanan sukses !');
    }

    public function destroy($idpesan)
    {
        $pesanbarang = pesanbarang::where('idpesan', '=',$idpesan);
        $pesanbarang->delete();
        return redirect('pesanbarang')->with('message','Hapus data sukses !');
    }


}
