<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    /* Eloquent will assume the Flight model stores records in the flights table. 
    You may specify a custom table by defining a table property on your model:*/
    protected $table = 'produtos';

    protected $fillable = ['nome','descricao','peso','unidade_id', 'fornecedor_id'];
    
    /* If your parent model does not use id as its primary key, or you wish to join the 
    child model to a different column, you may pass a third argument to the belongsTo 
    method specifying your parent table's custom key 
    
    return $this->belongsTo('App\Produto', 'foreign_key', 'other_key');
    return $this->belongsTo('App\Produto', 'produto_id', 'id');    
    */
    public function itemDetalhe(){
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }

    // belongsTo('App\Produto', 'foreign_key', 'other_key')
    public function fornecedor(){
        return $this->belongsTo('App\Fornecedor', 'fornecedor_id', 'id');
    }

     /*
            1 - Modelo do Relacionamento NxN em relação ao modelo que estamos implementando;
            2 - É a tabela auxiliar que armazena os registros de relacionamento
            3 - Representa o nome da FK da tabela mapeada pelo modelo (neste caso a tabela produto) 
                na tabela de relacionamento  (neste caso é a tabela pedidos_produtos) = produto_id
                ( o id de produto viaja para tabela pedidos_produtos como FK)
            4 - Representa o nome da FK da tabela mapeada pelo modelo utilizado na tabela do 
                relacionamento que estamos implementando (o model do primeiro parâmentro 'App\Pedido')
                ( o id de pedidos viaja como FK para a pedidos_produtos)
        */
    public function pedidos(){
        return $this->belongsToMany('App\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id');
    }

}
