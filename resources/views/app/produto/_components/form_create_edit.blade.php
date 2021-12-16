 @if(isset($produto->id))
    <form method="post" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
        @csrf
        @method('PUT')
@else               
    <form method="post" action="{{ route('produto.store') }}">
        @csrf
@endif    
         <select name="fornecedor_id">
            <option value="">Selecione</option>
            @foreach ($fornecedores as $fornecedor)
                <option value="{{ $fornecedor->id }}"  {{ $produto->fornecedor_id ?? old('fornecedor_id') == $fornecedor->id ? 'selected': '' }}>{{ $fornecedor->nome }}</option>    
            @endforeach
        </select>
             @if($errors->has('fornecedor_id')) 
                {{ $errors->first('fornecedor_id') }}
            @endif
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
                <option value="{{ $unidade->id }}"  {{ $produto->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected': '' }}>{{ $unidade->descricao }}</option>    
            @endforeach
        </select>
            @if($errors->has('unidade_id')) 
                {{ $errors->first('unidade_id') }}
            @endif
    
        <button type="submit" class="borda-preta">{{ isset($produto->id) ? 'Alterar' : 'Cadastrar'}}</button>
    </form>