<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Forncedor Seed';
        $fornecedor->site = 'fornecedor.com.br';
        $fornecedor->uf = 'BA';
        $fornecedor->email = 'contato@fornecedor.com.br';
        $fornecedor->save();
        
        Fornecedor::create([
            'nome' => 'Fornecedor Create', 
            'site' => 'fornecedor.com.br',
            'uf' => 'CE', 
            'email' => 'contato2@fornecedor.com.br'
        ]);
    }
}
