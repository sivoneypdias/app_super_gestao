<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    /* Eloquent will assume the Flight model stores records in the flights table. 
    You may specify a custom table by defining a table property on your model:*/
    protected $table = 'produto_detalhes';

    protected $fillable = ['produto_id','comprimento','largura','altura','unidade_id'];

    /*
    Additionally, Eloquent assumes that the foreign key should have a value matching the id 
    (or the custom $primaryKey) column of the parent. In other words, Eloquent will look for 
    the value of the user's id column in the user_id column of the Phone record. If you would 
    like the relationship to use a value other than id, you may pass a third argument to the 
    hasOne method specifying your custom key:
      
    return $this->hasOne('App\ProdutoDetalhe', 'foreign_key', 'local_key');
    return $this->hasOne('App\ProdutoDetalhe', 'produto_id', 'id');
    */ 
    public function item()
    {
        return $this->belongsTo('App\Item', 'produto_id', 'id');
    }
}
