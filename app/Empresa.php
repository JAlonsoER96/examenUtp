<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
   public $table = 'empresas';

   protected  $fillable = ['nombre','direccion','giro'];
}
