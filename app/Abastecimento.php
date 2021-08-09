<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abastecimento extends Model 
{
    protected $table = 'abastecimento';
    public $timestamps = false;
    protected $fillable = ['veiculo_id', 'motorista_id', 'tipo_combustivel_id', 'abastecimento', 'quantidade', 'valor_total'];
}