 @if(isset($cliente->id))
    <form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
        @csrf
        @method('PUT')
@else               
    <form method="post" action="{{ route('cliente.store') }}">
        @csrf
@endif  
        <input type="text" name="nome" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
            @if($errors->has('nome')) 
                {{ $errors->first('nome') }}
            @endif       
        <button type="submit" class="borda-preta">{{ isset($cliente->id) ? 'Alterar' : 'Cadastrar'}}</button>
    </form>