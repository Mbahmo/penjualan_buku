<?php

namespace SistemPenjualanBuku\Http\Controllers;

use Illuminate\Http\Request;
use SistemPenjualanBuku\Buku;



class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $buku=Buku::all();
        return view('pages.buku', ['buku'=>$buku,'halaman'=>'Buku']);

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
      $buku = new Buku;
      $buku->NoISBN=$request->noisbn;

      $buku->JudulBuku=$request->judul;
      $buku->Penulis =$request->penulis;
      $buku->Penerbit=$request->penerbit;
      $buku->Harga=$request->harga;

      $buku->save();
     return Redirect('/buku');

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
      
      $noisbn=$request->noisbn;
      $buku =Buku::find($noisbn);
      $buku->JudulBuku=$request->judul;
      $buku->Penulis =$request->penulis;
      $buku->Penerbit=$request->penerbit;
      $buku->Harga=$request->harga;
      $buku->save();
      return Redirect('/buku');

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

              $buku= Buku::find($id);
              $buku->delete();
              return Redirect('/buku');

    }
}
