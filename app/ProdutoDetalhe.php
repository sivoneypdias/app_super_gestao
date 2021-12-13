<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    protected $fillable = ['produto_id','comprimento','largura','altura','unidade_id'];


    /* If your parent model does not use id as its primary key, or you wish to join the 
    child model to a different column, you may pass a third argument to the belongsTo 
    method specifying your parent table's custom key 
    
    return $this->belongsTo('App\Produto', 'foreign_key', 'other_key');
    return $this->belongsTo('App\Produto', 'produto_id', 'id');
    
    */
    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }
}
