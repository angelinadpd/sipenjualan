<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\penjualan;
use App\pembeli;
use App\barang;
use App\Http\Controllers\Controller;

class penjualanController extends Controller
{
    public function index()
    {
        //$penjualans = penjualan::all();
        $penjualans = DB::table('penjualan')->leftjoin('pembeli', 'penjualan.idpembeli','=','pembeli.idpembeli')
            ->leftjoin('barang', 'penjualan.idbarang','=','barang.idbarang')
            ->select('penjualan.idpenjualan','penjualan.nota','penjualan.tgl','pembeli.nama','barang.type','penjualan.qty','penjualan.amount','penjualan.total')
            ->paginate(5);
        return view('penjualan.index', ['penjualans' => $penjualans]);
    }

    public function create()
    {
        $pembeli= DB::table('pembeli')->get();
        $barang= DB::table('barang')->get();
        return view('penjualan.create',['barang'=>$barang],['pembeli'=>$pembeli]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            ]);

        $penjualan = new penjualan;
        $penjualan->nota = str_random(8);
        $penjualan->tgl = $request->tgl;
        $penjualan->idpembeli = $request->idpembeli;
        $penjualan->idbarang = $request->idbarang;
        $penjualan->qty = $request->qty;
        $penjualan->amount = $request->amount;
        $penjualan->total = $request->total;
        $penjualan->save();

        return redirect('penjualan')->with('message','Simpan data penjualan sukses !');
    }

    public function show($penjualan)
    {
        //$penjualan=penjualan::find($idpenjualan);
        $pembeli= DB::table('pembeli')->get();
        $barang= DB::table('barang')->get();
        $penjualan=penjualan::where('idpenjualan',$penjualan)->first();
        if(!$penjualan){
            abort(404);
        }
        return view('penjualan.single',[
            'penjualan' => $penjualan,
            'pembeli' => $pembeli,
            'barang' => $barang
        ]);
    }

    public function edit($penjualan)
    {
        //$penjualan=penjualan::find($idpenjualan);
        $penjualan=penjualan::where('penjualan',$penjualan)->first();
        if(!$penjualan){
            abort(404);
        }
        return view('penjualan.single',[
            'penjualan' => $penjualan,
            'pembeli' => $pembeli,
            'barang' => $barang
        ]);
    }

    public function update(Request $request, $idpenjualan)
    {
         $this->validate($request, [
            'tgl'         => 'required',
            'idpembeli'   => 'required',
            'idbarang'    => 'required',
            'qty'         => 'required',
            'amount'      => 'required',
            'total'       => 'required',
            ]);

       $penjualan = penjualan::where('idpenjualan', '=',$idpenjualan);

        $paramsUpdate = [
        'tgl'       => $request->tgl,
        'idpembeli' => $request->idpembeli,
        'idbarang'  => $request->idbarang,
        'qty'       => $request->qty,
        'amount'    => $request->amount,
        'total'     => $request->total,
    ];
        $penjualan->update($paramsUpdate);

        return redirect('penjualan')->with('message','Update data penjualan sukses !');
    }

    public function destroy($idpenjualan)
    {
        $penjualan = penjualan::where('idpenjualan', '=',$idpenjualan);
        $penjualan->delete();
        return redirect('penjualan')->with('message','Hapus data sukses !');
    }
}
