@extends('app.layouts.basico')

@section('titulo', 'produto')
     
@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p>Visualizar Produtos</p>
    </div>

    <div class="menu">
        <ul>
            <a href="{{ route('produto.index')}}"><button class="btn btn-info">Voltar</button></a>
            
        </ul>

    </div>

    <div class="informacao-pagina">
        
        <div style="width: 30%; margin-left: auto; margin-right: auto;">

                
            <table class="table"  style="text-align: left" width="80%">
               
                <tr>
                    <td>ID:</td>
                    <td>{{ $produto->id }}</td>                       
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td>{{ $produto->nome }}</td>                       
                </tr>
                <tr>
                    <td>Valor:</td>
                    <td>{{ $produto->valor }}</td>                       
                </tr>
                    
            </table>
        </div>
    </div> 

</div>

@endsection