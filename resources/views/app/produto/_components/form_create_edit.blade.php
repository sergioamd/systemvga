@if (isset($produto->id))
<form method="post" action="{{ route('produto.update', ['produto' => $produto->id])}}">
   @csrf
   @method('PUT')
@else
<form method="post" action="{{ route('produto.store')}}">
   @csrf
@endif 
     

  <input type="text" name="nome" value="{{ $produto->nome ?? old('nome')}}" placeholder="Nome" class="form-control">
      {{$errors->has('nome') ? $errors->first('nome') : ''}}
      <br>
  <input type="text" name="valor" value="{{ $produto->valor ?? old('valor')}}" placeholder="valor" class="form-control">
      {{$errors->has('valor') ? $errors->first('valor') : ''}}   

  <br>
  <button type="submit" class="btn btn-success">Cadastrar</button>
</form>