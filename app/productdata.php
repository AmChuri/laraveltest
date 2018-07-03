<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productdata extends Model
{
     protected $table = 'productdatas';
    protected $fillable = ['productname','quantity','price','totalvaluenumber'];
    protected $hidden = [
        'remember_token'
    ];
}
