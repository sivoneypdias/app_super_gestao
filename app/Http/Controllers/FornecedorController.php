<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){

        $fornecedor = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
                                ->where('site', 'like', '%'.$request->input('site').'%')
                                ->where('uf', 'like', '%'.$request->input('uf').'%')
                                ->where('email', 'like', '%'.$request->input('email').'%')
                                ->paginate(5);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedor, 'request' => $request->all()]);
    }

    public function adicionar(Request $request){

        $msg = '';

        if($request->input('_token') != '' && $request->input('id') == ''){
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
        }else if($request->input('_token') != '' && $request->input('id') != ''){
            $msg = 'Falha na atualização do registro';

            $fornecedor = Fornecedor::find($request->id);
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'Atualização realizada com sucesso';
            }

            return redirect()->route('app.fornecedor.editar', ['id' =>  $request->input('id'), 'msg' => $msg]);

        }
        return view('app.fornecedor.adicionar',['msg' => $msg]);
    }

    public function editar($id, $msg){
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar',['fornecedor' => $fornecedor, 'msg' => $msg]);
    }
}
