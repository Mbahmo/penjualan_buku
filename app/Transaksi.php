<?php

namespace SistemPenjualanBuku;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
        public $timestamps = false;
    protected $table= 'tbtransaksi';
    protected $primaryKey = 'IdTransaksi';
    protected $guarded = 'IdTransaksi';
    protected $casts = [
    'Jumlah' => 'integer',
];
protected $fillable = ['NoTransaksi,NoISBN,TanggalTransaksi,Jumlah,TotalBayar,Status'];
}
