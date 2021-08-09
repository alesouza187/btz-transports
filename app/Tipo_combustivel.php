<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_combustivel extends Model 
{
    protected $table = 'tipo_combustivel';
    public $timestamps = false;
    protected $fillable = ['nome', 'preco'];
}


