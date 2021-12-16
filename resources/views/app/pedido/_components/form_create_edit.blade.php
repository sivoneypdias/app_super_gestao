 @if(isset($cliente->id))
    <form method="post" action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}">
        @csrf
        @method('PUT')
@else               
    <form method="post" action="{{ route('pedido.store') }}">
        @csrf
@endif  
        <select name="cliente_id">
            <option value="">Selecione</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}"  {{ $pedido->cliente_id ?? old('cliente_id') == $cliente->id ? 'selected': '' }}>{{ $cliente->nome }}</option>    
            @endforeach
        </select>
             @if($errors->has('cliente_id')) 
                {{ $errors->first('cliente_id') }}
            @endif
        <button type="submit" class="borda-preta">{{ isset($pedido->id) ? 'Alterar' : 'Cadastrar'}}</button>
    </form>