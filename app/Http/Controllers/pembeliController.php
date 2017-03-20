<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\pembeli;
use App\Http\Controllers\Controller;

class pembeliController extends Controller
{
    public function index()
    {
        //$pembelis = pembeli::all();
        $pembelis = DB::table('pembeli')->paginate(5);
        return view('pembeli.index', ['pembelis' => $pembelis]);
    }

    public function create()
    {
       return view('pembeli.create');
    }

    public function store(Request $request)
    {
        $pembeli = new pembeli;
        $pembeli->nama = $request->nama;
        $pembeli->alamat = $request->alamat;
        $pembeli->telp = $request->telp;
        $pembeli->save();

        return redirect('pembeli')->with('message','Simpan data pembeli sukses !');
    }

    public function show($idpembeli)
    {
        $pembeli = pembeli::where('idpembeli', '=',$idpembeli);
        $pembeli->delete();
        return redirect('pembeli');
        return view('pembeli.single')->with('pembeli',$pembeli);
    }

    public function edit($pembeli)
    {
        $pembeli=pembeli::where('idpembeli',$pembeli)->first();
        if(!$pembeli){
            abort(404);
        }
        return view('pembeli.edit')->with('pembeli',$pembeli);
    }
    public function update(Request $request, $idpembeli)
    {
         $this->validate($request, [
            'nama'          => 'required',
            'alamat'         => 'required',
            'telp'           => 'required',
        ]);

       $pembeli = pembeli::where('idpembeli', '=',$idpembeli);

        $paramsUpdate = [
        'nama'   => $request->nama,
        'alamat'  => $request->alamat,
        'telp'    => $request->telp,
    ];
        $pembeli->update($paramsUpdate);

        return redirect('pembeli')->with('message','Update data pembeli sukses !');

    }

    public function destroy($idpembeli)
    {
        $pembeli = pembeli::where('idpembeli', '=',$idpembeli);
        $pembeli->delete();
        return redirect('pembeli')->with('message','Hapus data pembeli sukses !');
    }
}
