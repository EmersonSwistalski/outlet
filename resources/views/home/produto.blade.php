@extends('layouts.app')
@include('layouts.navbar')
@section('content')
<div class="container">
  <div class="card mt-5">
      <div class="row">
        <div class="col-sm-5"> 
          <div>
            <a href="#"><img src="#"></a>
          </div>
        </div>
        <div class="col-sm-7">
          <div class="card-body">
            <h3 class="title mb-3">{{$produto->nome}}</h3>
            <p> 
              <span class="h3 text-warning">R$ {{$produto->valor}}</span> 
            </p>
            <label class="h5">Descricao</label>
            <p>{{$produto->descricao}}</p>         
            <hr>
              <form class="form-inline" action="{{ route('aplicarCupom',['produto_id' => $produto->id]) }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control-sm" placeholder="Cupom de Desconto" name="cupom">
                    <button type="submit" class="btn btn-dark">Aplicar</button>
                </div>
              </form>
            <hr>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection