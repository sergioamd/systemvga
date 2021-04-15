@extends('app.layouts.basico')

@section('titulo', 'produto')
     
@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">

        <h3>Adicionar Produto</h3>
       
        
    </div>

    <div class="menu">
        <ul>
            <a href="{{ route('produto.index')}}"><button class="btn btn-info">Voltar</button></a>
        </ul>

    </div>

    <div class="informacao-pagina">
        
        <div style="width: 50%; margin-left: auto; margin-right: auto;">
            @component('app.produto._components.form_create_edit')
                
            @endcomponent
        </div>
    </div> 

</div>

@endsection