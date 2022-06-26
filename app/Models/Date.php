<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;
    protected $table = 'dates';
    protected $guarded = [
      'id'
    ];

    function getProduct(){
        return $this -> belongsTo('App\Models\Product','product_id','id');
    }
}
