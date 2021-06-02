@extends('layouts.app')
@include('layouts.navbar')

@section('content')
<div class="mt-5"></div>
<table class="table table-striped">
    <a href="{{route('novoCupom')}}"><button type="button" class="btn btn-sm btn-outline-dark">Novo Cupom</button></a>
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">Nome</th>
        <th scope="col">Desconto</th>
        <th scope="col">Modo do Desconto</th>
        <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cupons as $cupom)
            <tr>
                <th scope="row">{{$cupom->id}}</th>
                <td>{{$cupom->nome}}</td>
                <td>{{$cupom->desconto}}</td>
                <td>{{$cupom->modo_desconto}}</td>
                <td><a href="{{route('alterarCupom', ['id' => $cupom->id])}}" class="mr-3"><img src="/images/edit.svg" alt="" width="20" height="20" class="align-text-center"></a>
                    <a href="{{route('deletarCupom', ['id' => $cupom->id])}}"><img src="/images/delete.svg" alt="" width="20" height="20" class="align-text-center"></a></td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection