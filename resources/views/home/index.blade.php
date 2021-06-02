@extends('layouts.app')
@include('layouts.navbar')
@section('content')

@if (Route::has('login'))
    @auth
        @include('layouts.admin-buttons')
    @endauth
@endif

<div class="row align-items-center">
    @foreach ($produtos as $produto)
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{route('exibirProduto', ['id' => $produto->id])}}" class="link-dark">{{$produto->nome}}</a></h5>
                    <p class="card-text">{{$produto->descricao}}</p>
                    <h3 class="card-title pricing-card-title">R$ {{$produto->valor}}</h1>
                    <form class="form-inline" action="{{ route('aplicarCupom',['produto_id' => $produto->id]) }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control-sm" placeholder="Cupom de Desconto" name="cupom">
                            <button type="submit" class="btn btn-dark btn-sm">Aplicar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection