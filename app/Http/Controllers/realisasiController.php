<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\realisasi;
use App\pesanbarang;
use App\Http\Controllers\Controller;

class realisasiController extends Controller
{
    public function index()
    {
        //$realisasis = realisasi::all();
        $realisasis = DB::table('realisasi')->join('pesanbarang', 'realisasi.idpesan','=','pesanbarang.idpesan')
            ->select('realisasi.idrealisasi','realisasi.nodo','pesanbarang.kode','pesanbarang.tgl','realisasi.price','realisasi.qty','realisasi.total','realisasi.status')
            ->paginate(5);
        return view('realisasi.index', ['realisasis' => $realisasis]);
    }

    public function create()
    {    
        $pesanbarang= DB::table('pesanbarang')->get();
        // DB::table('pesanbarang') ->where('status', pesan) ->update realisasi(['status' => masuk]); 

        return view('realisasi.create',['pesanbarang'=>$pesanbarang]);
    }

    public function store(Request $request)
    {
        $price = $request->price;
        $qty = $request->qty;
        $total = $price*$qty;
        

        $realisasi = new realisasi;
        $realisasi->nodo = str_random(8);
        $realisasi->idpesan = $request->idpesan;
        $realisasi->tgl = $request->tgl;
        $realisasi->price = $request->price;
        $realisasi->qty = $request->qty;
        $realisasi->total = $total;
        $realisasi->status = $request->status;
        $realisasi->save();

        return redirect('realisasi')->with('message','Simpan data realisasi sukses !');
    }

    public function show($realisasi)
    {
        $realisasi = realisasi::where('idrealisasi', '=',$idrealisasi);
        $realisasi->delete();
        return redirect('realisasi');

        // return view('realisasi.single',[
        //     'pesanbarang' => $pesanbarang,
        //     'realisasi' => $realisasi
        // ]);
    }

    public function edit($realisasi)
    {
        //$realisasi=realisasi::find($idrealisasi);
        $pesanbarang= DB::table('pesanbarang')->get();
        $realisasi=realisasi::where('idrealisasi',$realisasi)->first();
        if(!$realisasi){
            abort(404);
        }
        return view('realisasi.edit',[
            'pesanbarang' => $pesanbarang,
            'realisasi' => $realisasi
        ]);
    }

    public function update(Request $request, $idrealisasi)
    {
        $price = $request->price;
        $qty = $request->qty;
        $total = $price*$qty;

         $this->validate($request, [
            'idpesan'    => 'required',
            'tgl'        => 'required',
            'price'      => 'required',
            'qty'        => 'required',
            'status'     => 'required',
            ]);

        $realisasi = realisasi::where('idrealisasi', '=',$idrealisasi);

        $paramsUpdate = [
        'idpesan'   => $request->idpesan,
        'tgl'       => $request->tgl,
        'price'     => $request->price,
        'qty'       => $request->qty,
        'total'     => $total,
        'status'    => $request->status,
    ];
        $realisasi->update($paramsUpdate);

        return redirect('realisasi')->with('message','Update data realisasi sukses !');
    }

    public function destroy($idrealisasi)
    {
        $realisasi = realisasi::where('idrealisasi', '=',$idrealisasi);
        $realisasi->delete();
        return redirect('realisasi')->with('message','Hapus data sukses !');
    }
}
