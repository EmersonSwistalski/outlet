<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //
    }

    public function produto($id)
    {
        //
    }

    public function cupom(Request $request)
    {
        $data = [
            'produto_id' => intval($request->produto_id),
            'cupom' => $request->cupom,
        ];

        $request = Request::create(
            '/api/cupom/aplicar',
            'post',
            $data,
            [], // cookies
            [], // files
            $_SERVER
        );
        app()->handle($request);

        return redirect()->route('index');
    }
}
