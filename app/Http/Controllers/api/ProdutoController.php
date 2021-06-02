<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\ProdutoResource;
use App\Models\api\Cupom;
use App\Models\api\Produto;
use App\Models\api\ProdutoCupom;
use Error;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        $produtosComDesconto = ProdutoCupom::all();

        foreach ($produtos as $produto){
            foreach ($produtosComDesconto as $produtoComDesconto){
                if ($produtoComDesconto->produto_id == $produto->id){
                    $cupom = Cupom::findOrFail($produtoComDesconto->cupom_id);
                    if ($cupom->modo_desconto == "fixo"){
                        $produto->valor -= $cupom->desconto;
                    }
                    if ($cupom->modo_desconto == "porcentagem"){
                        $produto->valor -= $produto->valor * ($cupom->desconto / 100) / 100;  
                    }
                }
            }
        }

        return ProdutoResource::collection($produtos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->valor = $request->valor * 100;

        if ($produto->save()){
            return new ProdutoResource($produto);
        } else {
            return "Error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return new ProdutoResource($produto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->valor = $request->valor * 100;

        $produto->save();
        return new ProdutoResource($produto);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return new ProdutoResource($produto);
    }

}
