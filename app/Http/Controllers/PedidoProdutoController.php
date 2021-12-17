<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Produto;
use App\PedidoProduto;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param App\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        $pedido->produtos; // eager loading
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
          // validação
        $regras = [            
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required',
        ];

        $feedback = [
            'produto_id.exists' => 'O produto informado não existe.', 
            'required' => 'O campo :attribute dever ser preenchido'       
        ];

        $request->validate($regras, $feedback);  

        /*
        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id = $request->get('produto_id');
    //  $pedidoProduto->quantidade = $request->get('quantidade');
        $pedidoProduto->save();
        */

        /* When attaching a relationship to a model, you may also pass an array of additional 
        data to be inserted into the intermediate table:

        $user->roles()->attach($roleId, ['expires' => $expires]); */

        /*
        $pedido->produtos()->attach($request->get('produto_id'), [
            'quantidade' =>$request->get('quantidade')
        ]);
        */

        /* For convenience, attach and detach also accept arrays of IDs as input:
        $user->roles()->attach([
            1 => ['expires' => $expires],
            2 => ['expires' => $expires],
        ]);
        */
        $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade' =>$request->get('quantidade')],            
        ]);
        
        return redirect()->route('pedido-produto.create',['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido, Produto $produto)
    {

    /* Sometimes it may be necessary to remove a role from a user. To remove a many-to-many 
    relationship record, use the detach method. The detach method will delete the appropriate 
    record out of the intermediate table; however, both models will remain in the database:

        // Detach a single role from the user...
        $user->roles()->detach($roleId);
     */   
        $pedido->produtos()->detach($produto->id);
        return redirect()->route('pedido-produto.create',['pedido' => $pedido->id]);     
    }
}
