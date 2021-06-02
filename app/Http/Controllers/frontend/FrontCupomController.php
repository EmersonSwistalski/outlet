<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontCupomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $url = '/api/cupons';
        $method = 'GET';
        
        $cupons = json_decode(app()->handle(Controller::generateRequest($data, $url, $method))->content());
        $cupons = $cupons->data;

        return view('admin.cupom.listar-cupons', compact('cupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cupom.novo-cupom');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'nome' => $request->nome,
            'desconto' => $request->desconto,
            'modo_desconto' => $request->modo_desconto,
        ];
        $url = '/api/cupom/novo';
        $method = 'POST';

        app()->handle(Controller::generateRequest($data, $url, $method));

        return redirect()->route('listarCupons');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $url = '/api/cupom/'.$id;
        $method = 'GET';
        
        $cupom = json_decode(app()->handle(Controller::generateRequest($data, $url, $method))->content());
        $cupom = $cupom->data;

        return view('admin.cupom.alterar-cupom', compact('cupom'));
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
        $data = [
            'nome' => $request->nome,
            'desconto' => $request->desconto,
            'modo_desconto' => $request->modo_desconto,
        ];
        $url = '/api/cupom/alterar/'.$request->id;
        $method = 'PUT';

        app()->handle(Controller::generateRequest($data, $url, $method));

        return redirect()->route('listarCupons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = [];
        $url = '/api/cupom/deletar/'.$id;
        $method = 'delete';

        app()->handle(Controller::generateRequest($data, $url, $method));

        return redirect()->route('listarCupons');
    }
}
