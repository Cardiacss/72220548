<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laptop extends Model
{
    protected $table = "laptop";

    protected $fillable = [
        'Merek',
        'Nama',
        'Tahun',
        'Spek' ,
        'Harga',
        'gambar'
    ];
}
