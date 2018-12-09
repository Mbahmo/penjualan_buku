<?php

namespace SistemPenjualanBuku;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    //
    public $timestamps = false;
    protected $table= 'tbbuku';
    protected $primaryKey = 'NoISBN';
}
