@extends('app.layouts.basico')

@section('titulo', 'cobrança')
     
@section('conteudo')

<h3>Tabela de Cobrança</h3>

<div class="menu">
    <ul>
        <a href="{{ route('venda.create')}}"><button class="btn btn-success">Venda</button></a>
        
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
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Valor</th>
                    <th>Parcela</th>
                    <th>Valor Parcela</th>
                    <th>DtPgto</th>
                    <th>Pagar</th>
                    <th colspan="2">Ação</th>


                </tr>
            </thead>

            <tbody>
             @foreach ($venda as $venda )
                <tr>
                    
                    <td>{{ $venda->nome ?? ''}}</td>
                    <td>{{ $venda->telefone ?? ''}}</td>
                    <td>{{ $venda->rua ?? ''}}</td>
                    <td>{{ $venda->valor ?? ''}}</td>
                    <td>{{ $venda->parcelas ?? ''}}</td>
                    <td>{{ $venda->valorParcela ?? ''}} </td>
                    <td>{{ $venda->data ?? ''}}</td>
                    <td>
                        <form id="form{{$venda->id}}"method="post" action="{{ route('venda.update', ['venda' => $venda->id])}}">
                            @method('PUT')
                            @csrf
                            <a href="#" onclick="document.getElementById('form{{$venda->id}}').submit()"><button class="btn btn-success" >Pagar</button></a>
                        </form>    
                    </td>
                    <td><a href="{{ route('venda.show', ['venda' => $venda->id ])}}"><i class="fa fa-laptop" style="color:blue" title="Vizualisar Venda"></i></a>
                    </td>
                    <td>
                        <form id="form_{{$venda->id}}" method="post" action="{{ route('venda.destroy', ['venda' => $venda->id]) }}">
                            @method('DELETE')
                            @csrf
                        <a href="#" onclick="document.getElementById('form_{{$venda->id}}').submit()"> <i class="fa fa-trash-o" style="color:red" title="Cancelar Venda"></i></a>
                     </form>
                    
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