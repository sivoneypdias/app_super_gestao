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
}
