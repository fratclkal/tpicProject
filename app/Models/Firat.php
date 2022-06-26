<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firat extends Model
{
    use HasFactory;

    protected $table = 'firats';
    protected $fillable = [
      'name',
      'title',
      'start_date',
      'finish_date'
    ];
}
