@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>
        
        <div class="informacao-pagina">            
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
                    @csrf
                    @method('PUT')
                    <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                        @if($errors->has('nome')) 
                            {{ $errors->first('nome') }}
                        @endif
                    <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta">
                        @if($errors->has('descricao')) 
                            {{ $errors->first('descricao') }}
                        @endif
                    <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
                        @if($errors->has('peso')) 
                            {{ $errors->first('peso') }}
                        @endif
                    <select name="unidade_id">
                        <option value="">Selecione</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}"  {{  $produto->unidade_id ?? old('unidade_id') == $unidade->id  ? 'selected': '' }}>{{ $unidade->descricao }}</option>    
                        @endforeach
                    </select>
                        @if($errors->has('unidade_id')) 
                            {{ $errors->first('unidade_id') }}
                        @endif
                
                    <button type="submit" class="borda-preta">Alterar</button>
                </form>
            </div>
    </div>
@endsection