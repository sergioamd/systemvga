@extends('app.layouts.basico')

@section('titulo', 'Produto')
     
@section('conteudo')

<h3>Tabela de Produtos</h3>

<div class="menu">
    <ul>
        <a href="{{ route('produto.create')}}"><button class="btn btn-success">Novo</button></a>
        
    </ul>

</div>

<!--body wrapper start-->
<div class="wrapper">
    <div class="row">
    <div class="col-sm-12">
    <section class="panel">
  
    <div class="panel-body">
    <div class="adv-table">
    <table  class="display table table-bordered table-striped" id="dynamic-table">
        
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th colspan="3">Ação</th>
                </tr>
            </thead>

            <tbody>
             @foreach ($produtos as $produto )
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->valor }}</td>
                    <td><a href="{{ route('produto.show', ['produto' => $produto->id ])}}"><i class="fa fa-laptop" style="color:blue"  title="Vizualizar Produto"></i></a></td>
                    <td><a href="{{ route('produto.edit', ['produto' => $produto->id ])}}"> <i class="fa fa-list-alt" style="color:green" title="Alterar Produto"></i></a></td>
                    <td>
                        <form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                            @method('DELETE')
                            @csrf
                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()"><i class="fa fa-trash-o" style="color:red" title="Excluir Produto"></i></a>
                     </form>
                     </td>
                   
                </tr>
             @endforeach
            </tbody>
        
    </table>
    </div>
    </div>
    </section>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-12">
    
    </div>
    </div>
    </div>
    <!--body wrapper end-->


@endsection