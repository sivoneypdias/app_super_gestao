<?php

use Illuminate\Database\Seeder;
use \App\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Produto::create([
            'nome' => 'Geladeira', 
            'descricao' => 'Geladeira/Refrigerador Frost Free 375 litros', 
            'peso' => 60,
            'unidade_id' => 1
        ]); 
        
        Produto::create([
            'nome' => 'Smart TV', 
            'descricao' => 'Smart TV LED 42"', 
            'peso' => 8,
            'unidade_id' => 1
        ]);

    }
}
