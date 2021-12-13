@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="#">Consulta</a></li>           
            </ul>
        </div>
        
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <th>Comprimento</th>
                        <th>Largura</th>
                        <th>Altura</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($produtos as $produto)
                    <tr>                        
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->peso }}</td>
                        <td>{{ $produto->unidade_id }}</td>
                        <td>{{ $produto->comprimento ?? '' }}</td>
                        <td>{{ $produto->largura ?? '' }}</td>
                        <td>{{ $produto->altura ?? '' }}</td>                              
                        <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                        <td>
                             <form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                @csrf
                                @method('DELETE')                                
                                <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                        <td><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>                                                
                    </tr>
                @endforeach    
                </tbody>
            </table>
                {{--  append to the query string of pagination links using the appends method. --}}
                {{ $produtos->appends($request)->links() }}


                {{--  https://laravel.com/docs/8.x/pagination#paginator-instance-methods  --}}
                Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
                

            </div>
    </div>
@endsection