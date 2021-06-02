@extends('layouts.app')
@include('layouts.navbar')

@section('content')
<div class="mt-5 col-md-6 container align-items-center justify-content-center">
  <form method="POST" action="{{ route('novoCupom') }}">
    @csrf
    <div class="mb-3">
      <label for="nomeCupom" class="form-label">Nome do Cupom</label>
      <input type="text" class="form-control" name="nome">
    </div>
    <div class="mb-3">
      <label for="valorCupom" class="form-label">Desconto</label>
      <input type="text" class="form-control" name="desconto">
    </div>
    <label>Tipo do Desconto</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="modo_desconto" value="fixo" checked>
      <label class="form-check-label" for="flexRadioDefault1">
        Fixo
      </label>
    </div>
    <div class="mb-3 form-check">
      <input class="form-check-input" type="radio" name="modo_desconto" value="porcentagem">
      <label class="form-check-label" for="flexRadioDefault2">
        Porcentagem
      </label>
    </div>
    <button type="submit" class="btn btn-dark">Cadastrar</button>
  </form>
</div>
@endsection