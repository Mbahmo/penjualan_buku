<?php

namespace SistemPenjualanBuku\Http\Controllers;

use Illuminate\Http\Request;
use SistemPenjualanBuku\Supplier;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supplier=Supplier::all();
        return view('pages.Supplier', ['supplier'=>$supplier,'halaman'=>'Supplier']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      $supplier = new Supplier;
      $supplier->NamaSupplier=$request->nama;
      $supplier->AlamatSupplier =$request->alamat;
      $supplier->TelpSupplier=$request->telp;
      $supplier->save();
      return Redirect('/supplier');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id=$request->id;
      $supplier =Supplier::find($id);
      $supplier->NamaSupplier=$request->nama;
      $supplier->AlamatSupplier =$request->alamat;
      $supplier->TelpSupplier=$request->telp;
      $supplier->save();
      return Redirect('/supplier');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $supplier= Supplier::find($id);
              $supplier->delete();
              return Redirect('/supplier');

    }
}
