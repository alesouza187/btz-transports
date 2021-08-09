<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motorista extends Model 
{
    protected $table = 'motorista';
    public $timestamps = false;
    protected $fillable = ['nome', 'cpf', 'nascimento', 'cnh', 'categoria_cnh', 'status'];
}