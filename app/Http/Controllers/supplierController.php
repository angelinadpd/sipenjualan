<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\supplier;
use App\Http\Controllers\Controller;

class supplierController extends Controller
{
    public function index()
    {
        //$suppliers = supplier::all();
        $suppliers = DB::table('supplier')->paginate(5);
        return view('supplier.index', ['suppliers' => $suppliers]);
    }

    public function create()
    {
       return view('supplier.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            ]);

        $supplier = new supplier;
        $supplier->nama = $request->nama;
        $supplier->alamat = $request->alamat;
        $supplier->telp = $request->telp;
        $supplier->save();

        return redirect('supplier')->with('message','Simpa data supplier sukses !');
    }

    public function show($supplier)
    {
        //$supplier=supplier::find($idsupplier);
        $supplier=supplier::where('idsupplier',$supplier)->first();
        if(!$supplier){
            abort(404);
        }
        return view('supplier.single')->with('supplier',$supplier);
    }

    public function edit($supplier)
    {
        //$supplier=supplier::find($idsupplier);
        $supplier=supplier::where('supplier',$supplier)->first();
        if(!$supplier){
            abort(404);
        }
        return view('supplier.edit')->with('supplier',$supplier);
    }

    public function update(Request $request, $idsupplier)
    {
         $this->validate($request, [
            'nama'          => 'required',
            'alamat'         => 'required',
            'telp'           => 'required',
            ]);

        $supplier = supplier::where('idsupplier', '=',$idsupplier);

        $paramsUpdate = [
        'nama'   => $request->nama,
        'alamat'  => $request->alamat,
        'telp'    => $request->telp,
    ];
        $supplier->update($paramsUpdate);

        return redirect('supplier')->with('message','Update data supplier sukses !');
    }

    public function destroy($idsupplier)
    {
        $supplier = supplier::where('idsupplier', '=',$idsupplier);
        $supplier->delete();
        return redirect('supplier')->with('message','Hapus data sukses !');
    }
}
