<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(){

        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request){

        $msg = '';

        if($request->input('_token') != ''){
            $regras = [            
                'nome' => 'required|min:3|max:40|unique:fornecedores',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',                
            ];
    
            $feedback = [
                'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome dever ter no máximo 40 caracteres',
                'nome.unique' => 'O nome informado já está em uso',
    
                'email.email' => 'O email informado não é válido',

                'uf.min' => 'A mensagem deve ter no mínimo 2 caracteres',
                'uf.max' => 'A mensagem deve ter no máximo 2 caracteres',
    
                'required' => 'O campo :attribute dever ser preenchido'
            ];
    
            $request->validate($regras, $feedback);    

            Fornecedor::create($request->all());

            $msg = 'Cadastro realizado com sucesso';
        }
        return view('app.fornecedor.adicionar',['msg' => $msg]);
    }
}
