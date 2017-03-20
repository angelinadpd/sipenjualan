<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\laporanpenjualan;
use App\pesanbarang;
use App\realisasi;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;

class laporanpenjualanController extends BaseController
{
    public function index()
    {
        $laporanpenjualans = DB::table('laporanpenjualan')
         ->leftjoin('penjualan', 'laporanpenjualan.idpenjualan','=','penjualan.idpenjualan')
         ->leftjoin('barang', 'laporanpenjualan.idbarang','=','barang.idbarang')
         ->leftjoin('pembeli', 'laporanpenjualan.idpembeli', '=', 'pembeli.idpembeli')
         ->select('laporanpenjualan.idlaporanpenjualan', 'laporanpenjualan.date', 'penjualan.nota', 'penjualan.tgl', 'penjualan.tgl', 'pembeli.nama', 'penjualan.qty', 'barang.nama', 'barang.type', 'barang.price', 'barang.dpp', 'barang.ppn', 'penjualan.amount', 'penjualan.total')
         ->paginate(50);
         
        return view('laporanpenjualan.index', ['laporanpenjualans' => $laporanpenjualans]);

    }

    function harian(Request $request)
    {   
        //$date = $request->date;
        //$laporanpenjualans = laporanpenjualan::whereRaw('date(created_at) = ?', [$date])->get();

        $laporanpenjualans = DB::table('laporanpenjualan')
         ->leftjoin('penjualan', 'laporanpenjualan.idpenjualan','=','penjualan.idpenjualan')
         ->leftjoin('barang', 'laporanpenjualan.idbarang','=','barang.idbarang')
         ->leftjoin('pembeli', 'laporanpenjualan.idpembeli', '=', 'pembeli.idpembeli')
         ->select('laporanpenjualan.idlaporanpenjualan', 'laporanpenjualan.date', 'penjualan.nota', 'penjualan.tgl', 'penjualan.tgl', 'pembeli.nama', 'penjualan.qty', 'barang.idbarang', 'barang.type', 'barang.price', 'barang.dpp', 'barang.ppn', 'penjualan.amount', 'penjualan.total')
         ->paginate(50);
         
        return view('laporanpenjualan.harian', ['laporanpenjualans' => $laporanpenjualans]);
        //return View('laporanpenjualan.indexharian',['laporanpenjualans' => $laporanpenjualans])->with('pesanbarang', pesanbarang::all()) ->with('realisasi', realisasi::all());
    }

    function mingguan(Request $request)
    {   
        //$date = $request->date;
        //$laporanpenjualans = laporanpenjualan::whereBetween('laporanpenjualan_from', [$from, $to])->get();
         //$laporanpenjualans = laporanpenjualan::where(function($q) { 
           // $q->where(DB::raw('created_at BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()')); 
            //$q->where('deleted_at', '=', 0); 
        //});  

        $laporanpenjualans = DB::table('laporanpenjualan')
         ->leftjoin('penjualan', 'laporanpenjualan.idpenjualan','=','penjualan.idpenjualan')
         ->leftjoin('barang', 'laporanpenjualan.idbarang','=','barang.idbarang')
         ->leftjoin('pembeli', 'laporanpenjualan.idpembeli', '=', 'pembeli.idpembeli')
         ->select('laporanpenjualan.idlaporanpenjualan', 'laporanpenjualan.date', 'penjualan.nota', 'penjualan.tgl', 'penjualan.tgl', 'pembeli.nama', 'penjualan.qty', 'barang.idbarang', 'barang.type', 'barang.price', 'barang.dpp', 'barang.ppn', 'penjualan.amount', 'penjualan.total')
         ->paginate(50);
        return view('laporanpenjualan.mingguan', ['laporanpenjualans' => $laporanpenjualans]);
         
    }

    function bulanan(Request $request)
    {   
        $laporanpenjualans = DB::table('laporanpenjualan')
         ->leftjoin('penjualan', 'laporanpenjualan.idpenjualan','=','penjualan.idpenjualan')
         ->leftjoin('barang', 'laporanpenjualan.idbarang','=','barang.idbarang')
         ->leftjoin('pembeli', 'laporanpenjualan.idpembeli', '=', 'pembeli.idpembeli')
         ->select('laporanpenjualan.idlaporanpenjualan', 'laporanpenjualan.date', 'penjualan.nota', 'penjualan.tgl', 'penjualan.tgl', 'pembeli.nama', 'penjualan.qty', 'barang.idbarang', 'barang.type', 'barang.price', 'barang.dpp', 'barang.ppn', 'penjualan.amount', 'penjualan.total')
         ->paginate(50);
        return view('laporanpenjualan.bulanan', ['laporanpenjualans' => $laporanpenjualans]);
         
    }

    function tahunan(Request $request)
    {   
        $laporanpenjualans = DB::table('laporanpenjualan')
         ->leftjoin('penjualan', 'laporanpenjualan.idpenjualan','=','penjualan.idpenjualan')
         ->leftjoin('barang', 'laporanpenjualan.idbarang','=','barang.idbarang')
         ->leftjoin('pembeli', 'laporanpenjualan.idpembeli', '=', 'pembeli.idpembeli')
         ->select('laporanpenjualan.idlaporanpenjualan', 'laporanpenjualan.date', 'penjualan.nota', 'penjualan.tgl', 'penjualan.tgl', 'pembeli.nama', 'penjualan.qty', 'barang.idbarang', 'barang.type', 'barang.price', 'barang.dpp', 'barang.ppn', 'penjualan.amount', 'penjualan.total')
         ->paginate(50);
        return view('laporanpenjualan.tahunan', ['laporanpenjualans' => $laporanpenjualans]);
         
    }
}

