<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Catalog extends Model
{
     protected $table = 'catalog';
     protected $fillable = ['name','type','power'];

}
