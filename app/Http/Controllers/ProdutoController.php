<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Unidade;
use App\Item;
use Illuminate\Http\Request;
use App\ProdutoDetalhe;
use App\Fornecedor;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // https://laravel.com/docs/5.2/eloquent-relationships#eager-loading
        // alterando o carregamento de Lazy Loading para Eager Loading
        $produtos = Item::with('itemDetalhe','fornecedor')->paginate(10);
       
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();

        return view('app.produto.create',[
            'unidades' => $unidades, 
            'fornecedores' => $fornecedores
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validação
         $regras = [            
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',  
            'fornecedor_id' => 'exists:fornecedores,id',                            
        ];

        $feedback = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome dever ter no máximo 40 caracteres',            

            'descricao.min' => 'O campo descrição precisa ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo descrição dever ter no máximo 2000 caracteres',            

            'peso.integer' => 'O campo peso deve ser um número inteiro',

            'unidade_id.exists' => 'A unidade de medida informada não existe.',

            'fornecedor_id.exists' => 'O fornecedor informado não existe.',

            'required' => 'O campo :attribute dever ser preenchido'
        ];

        $request->validate($regras, $feedback);  

        item::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Item $produto)
    {
        //
        return view('app.produto.show',['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $produto)
    {
        //
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.edit',[
            'produto' => $produto, 
            'unidades' => $unidades, 
            'fornecedores' => $fornecedores
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        //
         // validação
         $regras = [            
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',  
            'fornecedor_id' => 'exists:fornecedores,id',                            
        ];

        $feedback = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome dever ter no máximo 40 caracteres',            

            'descricao.min' => 'O campo descrição precisa ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo descrição dever ter no máximo 2000 caracteres',            

            'peso.integer' => 'O campo peso deve ser um número inteiro',

            'unidade_id.exists' => 'A unidade de medida informada não existe.',

            'fornecedor_id.exists' => 'O fornecedor informado não existe.',

            'required' => 'O campo :attribute dever ser preenchido'
        ];

        $request->validate($regras, $feedback);  

        $produto->update($request->all());
        
        return redirect()->route('produto.show',['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $produto)
    {
        //
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
