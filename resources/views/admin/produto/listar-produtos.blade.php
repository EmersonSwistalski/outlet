@extends('layouts.app')
@include('layouts.navbar')

@section('content')
<div class="mt-5"></div>
<table class="table table-striped">
    <a href="{{route('novoProduto')}}"><button type="button" class="btn btn-sm btn-outline-dark">Novo Produto</button></a>
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">Nome</th>
        <th scope="col">Descricao</th>
        <th scope="col">Valor</th>
        <th scope="col">Cupom</th>
        <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $produto)
            <tr>
                <th scope="row">{{$produto->id}}</th>
                <td>{{$produto->nome}}</td>
                <td>{{$produto->descricao}}</td>
                <td>{{$produto->valor}}</td>
                <td></td>
                <td><a href="{{route('alterarProduto', ['id'=>$produto->id])}}" class="mr-3"><img src="/images/edit.svg" alt="" width="20" height="20" class="align-text-center"></a>
                    <a href="{{route('deletarProduto', ['id'=>$produto->id])}}"><img src="/images/delete.svg" alt="" width="20" height="20" class="align-text-center"></a></td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection