<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\laporanpembelian;
use App\pesanbarang;
use App\realisasi;
use App\Http\Controllers\Controller;

class laporanpembelianController extends Controller
{
    public function index()
    {
        //$date->whereDate('created_at', '=', Carbon::today()->toDateString());
         $laporanpembelians = DB::table('laporanpembelian')
            ->join('pesanbarang', 'laporanpembelian.idpesan','=','pesanbarang.idpesan')
            ->join('realisasi', 'laporanpembelian.idrealisasi','=','realisasi.idrealisasi')
            ->select('*')
            ->paginate(5);
        return view('laporanpembelian.index', ['laporanpembelians' => $laporanpembelians]);

    }

    function indexharian()
    {
        $laporanpembelians = DB::table('laporanpembelian')
            ->join('pesanbarang', 'laporanpembelian.idpesan','=','pesanbarang.idpesan')
            ->join('realisasi', 'laporanpembelian.idrealisasi','=','realisasi.idrealisasi')
            ->select('*')
            ->paginate(50);
         return view('laporanpembelian.indexharian', ['laporanpembelians' => $laporanpembelians]);
    }

    public function show($laporanpembelian)
    {
        $laporanpembelian=laporanpembelian::where('idlaporanpembelian',$laporanpembelian)->first();
        if(!$laporanpembelian){
            abort(404); 
        }
        return view('laporanpembelian.indexharian')
                ->with('laporanpembelians',$laporanpembelian);
    }

}
