<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model 
{
    protected $table = 'veiculo';
    public $timestamps = false;
    protected $fillable = ['tipo_combustivel_id', 'nome', 'placa', 'nome_fabricante', 'ano_fabricacao', 'capacidade_tanque', 'observavao'];
}


