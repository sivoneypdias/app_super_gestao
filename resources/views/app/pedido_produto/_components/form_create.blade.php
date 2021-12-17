
    <form method="post" action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}">
        @csrf
        <select name="produto_id">
            <option value="">Selecione</option>
            @foreach ($produtos as $produto)
                <option value="{{ $produto->id }}"  {{ $produto->produto_id ?? old('produto_id') == $produto->id ? 'selected': '' }}>{{ $produto->nome }}</option>    
            @endforeach
        </select>
             @if($errors->has('produto_id')) 
                {{ $errors->first('produto_id') }}
            @endif

        <input type="number" name="quantidade" value="{{ old('quantidade') ? old('quantidade') : '' }}" placeholder="Quantidade" class="borda-preta">
          @if($errors->has('quantidade')) 
                {{ $errors->first('quantidade') }}
            @endif

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>