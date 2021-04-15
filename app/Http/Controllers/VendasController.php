<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendas;
use App\Cliente;
use App\Produto;
use App\Tipo;
Use \Carbon\Carbon;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $clientes = Cliente::all();
        $produtos = Produto::all();
        $venda = Vendas::all();
        return view('app.venda.index', ['request' => $request->all() ,'venda' => $venda, 'clientes' => $clientes, 'produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        $tipos    = Tipo::all();
       return view('app.venda.create', ['clientes' => $clientes, 'produtos' => $produtos, 'tipos' => $tipos]);
   
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $parcela = $request->get('parcelas');
        if(empty($parcela)){
            
                $vendas1 = new Vendas();
                $vendas1->cliente_id = $request->get('cliente_id');
                $vendas1->produto_id = $request->get('produto_id');
                $vendas1->quantidade = $request->get('quantidade');
                $vendas1->valor = $request->get('valor');
                $vendas1->entrada = $request->get('entrada');
                $vendas1->total = $request->get('tot');
                $vendas1->tipo = $request->get('tipo');
                $vendas1->parcelas = "0";
                $vendas1->valorParcela = "0.00";
                 
                $vendas1->save();
             
            }else {

           
            for( $i = 1; $i <= $parcela; $i++){

                
                $vendas = new Vendas();
                $vendas->cliente_id = $request->get('cliente_id');
                $vendas->produto_id = $request->get('produto_id');
                $vendas->quantidade = $request->get('quantidade');
                $vendas->valor = $request->get('valor');
                $vendas->entrada = $request->get('entrada');
                $vendas->total = $request->get('tot');
                $vendas->tipo = $request->get('tipo');
                //$vendas->parcelas = $request->get('parcelas');
         
            
                    $tot = $request->get('tot');  //recebe o valor total
                    $par = $request->get('parcelas'); //recebe o valor total de parcelas
                    $totPar = ($tot / $par); 

                        $dias = 30 * $i;  //adiciona 30 dias a cada parcela
                        $datas = date('y-m-d', strtotime("+{$dias} days"));
                        
                    $vendas->parcelas = $i;
                    
                    $vendas->data = $datas; 
                    
                    $vendas->valorParcela = $totPar;
                    
                    $vendas->save();
           
         } }           
            
         
         
         //dd($vendas);

        return redirect()->route('mostrar.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(vendas $venda)
    {
          
         $vendaCliente = Cliente::where('id', $venda->Cliente_id)->first();
         $vendaProduto = Produto::where('id', $venda->produto_id)->first();
         $tipos    = Tipo::all();
       return view('app.venda.show', ['vendaCliente' => $vendaCliente,'vendaProduto' => $vendaProduto,'venda' => $venda, 'tipos' => $tipos]);
      
    }

    

    /**
     * edita a tabela de vendas trazendo os clientes a venda e os produtos
     *
     * @param  int  $vendas
     * @return \Illuminate\Http\Response
     */
    public function edit(vendas $venda)
    {
       
        $clientes = Cliente::all();
        $produtos = Produto::all();
       
        return view('app.venda.edit', ['venda' => $venda, 'clientes' => $clientes, 'produtos' => $produtos]);
   
    }

    /**
     * aqui atualiza o status de pago e pega a data atual e atualiza o campo data 
     *ao clicar no botão pago
    *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $venda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vendas $venda)
    {
        
         $venda->status = 'pago';
         $venda->data = Carbon::now();
         $venda->update($request->all());
         return redirect()->route('mostrar.index', ['venda' => $venda->id]);
        
    }
    

    /**
     * Remove a venda mas naão esta sendo utilizado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendas $venda)
    {
        $venda->delete();
        return redirect()->route('mostrar.index');
    }
}
