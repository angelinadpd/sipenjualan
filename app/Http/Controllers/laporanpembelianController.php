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
            ->join('pesanbarang', 'laporanpembelian.idpesan','=','pesanbarang.idpesan')
            ->join('realisasi', 'laporanpembelian.idrealisasi','=','realisasi.idrealisasi')
            ->select('laporanpembelian.idlaporanpembelian','pesanbarang.kode','pesanbarang.noso','pesanbarang.tgl','pesanbarang.idbarang','realisasi.nodo','realisasi.tgl','realisasi.qty','realisasi.price','realisasi.total','realisasi.status')
            ->paginate(5);
        return view('laporanpembelian.index', ['laporanpembelians' => $laporanpembelians]);

    }

    function indexharian($date)
    {
        //$date->whereDate('created_at', '=', Carbon::today()->toDateString());
       //$date->whereDate('date', '=', date('Y-m-d'));

        $laporanpembelians = DB::table('laporanpembelian')
         ->join('pesanbarang', 'laporanpembelian.idpesan','=','pesanbarang.idpesan')
         ->join('realisasi', 'laporanpembelian.idrealisasi','=','realisasi.idrealisasi')
         ->select('laporanpembelian.idlaporanpembelian','pesanbarang.kode','pesanbarang.noso','pesanbarang.tgl','pesanbarang.idbarang','realisasi.nodo','realisasi.tgl','realisasi.qty','realisasi.price','realisasi.total','realisasi.status')
         ->paginate(50);
         return view('laporanpembelian.indexharian', ['laporanpembelians' => $laporanpembelians]);
        //return View('laporanpembelian.indexharian',['laporanpembelians' => $laporanpembelians])->with('pesanbarang', pesanbarang::all()) ->with('realisasi', realisasi::all());
    }

}
