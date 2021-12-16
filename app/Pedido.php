<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function cliente(){
        return $this->belongsTo('App\Cliente', 'cliente_id', 'id');
    }
}
