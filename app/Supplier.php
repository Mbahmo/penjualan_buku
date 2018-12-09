<?php

namespace SistemPenjualanBuku;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //   
     public $timestamps = false;
    protected $table= 'tbsupplier';
    protected $primaryKey = 'IdSupplier';
     protected $guarded = 'IdSupplier';
}
