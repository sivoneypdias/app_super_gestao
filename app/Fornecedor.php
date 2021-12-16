<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{

    use SoftDeletes;
    
    // https://laravel.com/docs/8.x/eloquent#table-names
    protected $table = 'fornecedores';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * @see https://laravel.com/docs/7.x/eloquent#mass-assignment
     */
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    /* 
    override the foreign and local keys by passing additional arguments to the hasMany method:
    return $this->hasMany('App\Item', 'foreign_key', 'local_key');    
    */
    public function produtos(){
        return $this->hasMany('App\Item', 'fornecedor_id', 'id');
    }
}
