<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\CupomResource;
use App\Models\api\Cupom;
use Illuminate\Http\Request;

class CupomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CupomResource::collection(Cupom::all());
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
        $cupom = new Cupom();
        $cupom->nome = $request->nome;
        $cupom->modo_desconto = $request->modo_desconto;
        $cupom->desconto = $request->desconto * 100;

        
        if ($cupom->save()){
            return new CupomResource($cupom);
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
        $cupom = Cupom::findOrFail($id);
        return new CupomResource($cupom);
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
        $cupom = Cupom::findOrFail($id);
        $cupom->nome = $request->nome;
        $cupom->desconto = $request->desconto * 100;
        $cupom->modo_desconto = $request->modo_desconto;
        
        $cupom->save();
        return new CupomResource($cupom);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cupom = Cupom::findOrFail($id);
        if($cupom->delete()){
            return new CupomResource($cupom);
        }
    }
}
