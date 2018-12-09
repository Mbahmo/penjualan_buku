<?php

namespace SistemPenjualanBuku\Http\Controllers;

use Illuminate\Http\Request;
use SistemPenjualanBuku\Transaksi;
use SistemPenjualanBuku\Buku;
use Carbon\Carbon;


class TransaksiController extends Controller
{
    //
     public function index(){
        $buku=Buku::all();
        $transaksi=Transaksi::select(
                '*'
            )
            ->join(
                'tbbuku',
                'tbbuku.NoISBN',
                '=',
                'tbtransaksi.NoISBN'
            )->where('Status', '=', 'Keranjang') ->get();
            $cek=$transaksi->count();
        return view('pages.transaksi', ['buku'=>$buku,'transaksi'=>$transaksi,'cek'=>$cek,'halaman'=>'Transaksi']);
    }
    public function store(Request $request) {
        //
        //CEK BUKU
        $cek=Transaksi::select(
                'Jumlah'
            )->where('Status', '=', 'Keranjang')->where('NoISBN', '=', $request->buku) ->count();
        if ($cek>0) {
            $transaksi =Transaksi::select(
                '*'
            ) ->join(
                'tbbuku',
                'tbbuku.NoISBN',
                '=',
                'tbtransaksi.NoISBN'
            )->where('Status', '=', 'Keranjang')->where('tbtransaksi.NoISBN', '=', $request->buku)->where('NoTransaksi', '=', '')->first();
            // dd($request->jumlah);
            $transaksi->Jumlah=$transaksi->Jumlah+$request->jumlah;
            $transaksi->TotalBayar=($transaksi->Harga *$request->jumlah) +$transaksi->TotalBayar;

        } else {
            $transaksi = new Transaksi;
            $harga=Buku::select('Harga')->where('NoISBN', '=', $request->buku)->first();
            //   dd($harga=Buku::select('Harga')->where('NoISBN', '=', $request->buku)->get());
            // dd($request->jumlah);
            $transaksi->NoISBN=$request->buku;
            $transaksi->Jumlah =$request->jumlah;
            $transaksi->NoTransaksi="";
            $transaksi->Status="Keranjang";

            $transaksi->TotalBayar=$harga->Harga *$request->jumlah;
            $transaksi->TanggalTransaksi=Carbon::now();
         
                $transaksi = new Transaksi;
                $harga=Buku::select('Harga')->where('NoISBN', '=', $request->buku)->first();
                //   dd($harga=Buku::select('Harga')->where('NoISBN', '=', $request->buku)->get());
                // dd($request->jumlah);
                $transaksi->NoISBN=$request->buku;
                $transaksi->Jumlah =$request->jumlah;
                $transaksi->NoTransaksi="";
                $transaksi->Status="Keranjang";

                $transaksi->TotalBayar=$harga->Harga *$request->jumlah;
                $transaksi->TanggalTransaksi=Carbon::now();
            
                }
            $transaksi->save();
            return Redirect('/transaksi');
        
    }
    public function destroy($id){
        //
        $transaksi= Transaksi::find($id);
              $transaksi->delete();
              return Redirect('/transaksi');

    }
    public function checkout(){
         $Kunci="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $Bulan=date('y-m');
        $Huruf=substr(str_shuffle($Kunci), 0, 4);
        $NoTransaksi=$Huruf.$Bulan;

 $transaksi =Transaksi::select(
                '*'
            )->where('Status', '=', 'Keranjang')->where('NoTransaksi', '=', '')->update(
                ['Status' =>'Lunas',
                'NoTransaksi' => $NoTransaksi]
            );
            // $transaksi->status="Lunas";
            // $transaksi->NoTransaksi=$this->NoTransaksi();
            // $transaksi->save();
            return Redirect('/transaksi');

    }
}
