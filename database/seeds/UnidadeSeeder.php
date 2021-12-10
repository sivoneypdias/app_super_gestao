<?php

use Illuminate\Database\Seeder;
use \App\Unidade;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidade::create([
            'unidade' => 'UN', 
            'descricao' => 'Unidade',            
        ]);
    }
}
