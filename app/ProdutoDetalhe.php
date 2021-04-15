<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    protected $table = 'produto_detalhes';

    protected $fillable = ['produto_id','comprimento', 'altura', 'largura', 'unidade_id'];

    /* 
    *belongsto 
    *relacionamento 1 para 1
    */

   
}
