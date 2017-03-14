<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\laporanpembelian;
use App\pesanbarang;
use App\realisasi;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;

class laporanpembelianController extends BaseController
{
    public function index()
    {
        $laporanpembelians = DB::table('laporanpembelian')
         ->leftjoin('pesanbarang', 'laporanpembelian.idpesan','=','pesanbarang.idpesan')
         ->leftjoin('realisasi', 'laporanpembelian.idrealisasi','=','realisasi.idrealisasi')
         ->leftjoin('barang', 'laporanpembelian.idbarang','=','barang.idbarang')
         ->select('laporanpembelian.idlaporanpembelian', 'laporanpembelian.date', 'pesanbarang.kode', 'pesanbarang.noso', 'pesanbarang.tgl', 'barang.nama', 'realisasi.nodo', 'realisasi.tgl', 'realisasi.qty', 'realisasi.price', 'realisasi.total', 'realisasi.status')
         ->paginate(50);
         
        return view('laporanpembelian.index', ['laporanpembelians' => $laporanpembelians]);

    }

    function indexharian(Request $request)
    {   
        $date = $request->date;
        $laporanpembelian = laporanpembelian::whereRaw('date(created_at) = ?', [$date])->get();

        $laporanpembelians = DB::table('laporanpembelian')
         ->leftjoin('pesanbarang', 'laporanpembelian.idpesan','=','pesanbarang.idpesan')
         ->leftjoin('realisasi', 'laporanpembelian.idrealisasi','=','realisasi.idrealisasi')
         ->leftjoin('barang', 'laporanpembelian.idbarang','=','barang.idbarang')
         ->select('laporanpembelian.idlaporanpembelian', 'laporanpembelian.date', 'pesanbarang.kode', 'pesanbarang.noso', 'pesanbarang.tgl', 'barang.nama', 'realisasi.nodo', 'realisasi.tgl', 'realisasi.qty', 'realisasi.price', 'realisasi.total', 'realisasi.status')
         ->paginate(50);
         
        return view('laporanpembelian.indexharian', ['laporanpembelians' => $laporanpembelians]);
        //return View('laporanpembelian.indexharian',['laporanpembelians' => $laporanpembelians])->with('pesanbarang', pesanbarang::all()) ->with('realisasi', realisasi::all());
    }

    function mingguan(Request $request)
    {   
        $date = $request->date;
        //$laporanpembelians = laporanpembelian::whereBetween('laporanpembelian_from', [$from, $to])->get();
         $laporanpembelians = laporanpembelian::where(function($q) { 
            $q->where(DB::raw('created_at BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()')); 
            $q->where('deleted_at', '=', 0); 
        });  

        $laporanpembelians = DB::table('laporanpembelian')
         ->leftjoin('pesanbarang', 'laporanpembelian.idpesan','=','pesanbarang.idpesan')
         ->leftjoin('realisasi', 'laporanpembelian.idrealisasi','=','realisasi.idrealisasi')
         ->leftjoin('barang', 'laporanpembelian.idbarang','=','barang.idbarang')
         ->select('laporanpembelian.idlaporanpembelian', 'laporanpembelian.date', 'pesanbarang.kode', 'pesanbarang.noso', 'pesanbarang.tgl', 'barang.nama', 'realisasi.nodo', 'realisasi.tgl', 'realisasi.qty', 'realisasi.price', 'realisasi.total', 'realisasi.status')
         ->paginate(50);
        return view('laporanpembelian.mingguan', ['laporanpembelians' => $laporanpembelians]);
         
    }

    public function show($pesanbarang)
    {
        $laporanpembelian= DB::table('laporanpembelian')->get();
        $laporanpembelian=laporanpembelian::where('idlaporanpembelian',$laporanpembelian)->first();
        if(!$laporanpembelian){
            abort(404);
        }
        return view('laporanpembelian.single',[
            'pesanbarang' => $pesanbarang,
            'realisasi' => $realisasi
        ]);
    }

}
