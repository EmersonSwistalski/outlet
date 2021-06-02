@extends('layouts.app')
@include('layouts.navbar')

@section('content')
<div class="mt-5 col-md-6 container align-items-center justify-content-center">
  <form method="POST" action="{{ route('novoProduto') }}">
    @csrf
    <div class="mb-3">
      <label for="nomeProduto" class="form-label">Nome do Produto</label>
      <input type="text" class="form-control" name="nome">
    </div>
    <div class="mb-3">
      <label for="descricaoProduto" class="form-label">Descricao do Produto</label>
      <input type="text" class="form-control" name="descricao">
    </div>
    <div class="mb-3">
      <label for="valorProduto" class="form-label">Valor do Produto</label>
      <input type="number" class="form-control" name="valor" step="0.01">
    </div>
    <button type="submit" class="btn btn-dark">Cadastrar</button>
  </form>
</div>
@endsection