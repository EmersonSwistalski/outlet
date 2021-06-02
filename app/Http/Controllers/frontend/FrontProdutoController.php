<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $url = '/api/produtos';
        $method = 'GET';
        
        $produtos = json_decode(app()->handle(Controller::generateRequest($data, $url, $method))->content());
        $produtos = $produtos->data;

        return view('home.index', compact('produtos'));
    }

    public function indexProdutos()
    {
        $data = [];
        $url = '/api/produtos';
        $method = 'GET';
        
        $produtos = json_decode(app()->handle(Controller::generateRequest($data, $url, $method))->content());
        $produtos = $produtos->data;

        return view('admin.produto.listar-produtos', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produto.novo-produto');
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
            'descricao' => $request->descricao,
            'valor' => $request->valor,
        ];
        $url = '/api/produto/novo';
        $method = 'POST';

        app()->handle(Controller::generateRequest($data, $url, $method));

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $url = '/api/produto/'.$id;
        $method = 'GET';
        
        $produto = json_decode(app()->handle(Controller::generateRequest($data, $url, $method))->content());
        $produto = $produto->data;

        return view('home.produto', compact('produto'));
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
        $url = '/api/produto/'.$id;
        $method = 'GET';
        
        $produto = json_decode(app()->handle(Controller::generateRequest($data, $url, $method))->content());
        $produto = $produto->data;

        return view('admin.produto.alterar-produto', compact('produto'));
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
            'descricao' => $request->descricao,
            'valor' => $request->valor,
        ];
        $url = '/api/produto/alterar'.$request->id;
        $method = 'put';

        app()->handle(Controller::generateRequest($data, $url, $method));

        return redirect()->route('index');
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
        $url = '/api/produto/deletar/'.$id;
        $method = 'delete';

        app()->handle(Controller::generateRequest($data, $url, $method));

        return redirect()->route('listarProdutos');
    }
}
