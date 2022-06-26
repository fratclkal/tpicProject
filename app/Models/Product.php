<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [
      'id'
    ];
    protected $fillable = ['unit','shelf','product_name','product_no','stock','warehouse','brand_id'];

    function getBrand(){
        return $this -> belongsTo('App\Models\Brand','brand_id','id');
    }

    function getDate(){
        return $this -> hasMany('App\Models\Date','product_id','id');
    }
}
