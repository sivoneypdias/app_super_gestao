<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function cliente(){
        return $this->belongsTo('App\Cliente', 'cliente_id', 'id');
    }

    /*
    to customizing the name of the joining table, you may also customize the column names of 
    the keys on the table by passing additional arguments to the belongsToMany method. The 
    third argument is the foreign key name of the model on which you are defining the 
    relationship, while the fourth argument is the foreign key name of the model that you are 
    joining to:

    return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id'); 

    By default, only the model keys will be present on the pivot object. If your pivot table contains extra attributes, you must specify them when defining the relationship:

    return $this->belongsToMany('App\Role')->withPivot('column1', 'column2');
    */
    public function produtos(){
        return $this->belongsToMany('App\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('created_at'); 
    }
}
