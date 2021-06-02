@extends('layouts.app')
@section('content')
<main class="text-center">
    <div class="container mt-5">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <img class="mb-2" src="/images/outlet.svg" alt="" width="80" height="65">
            <h1 class="h3 mb-3">Cadastrar Novo Usuário</h1>

            <div class="col-lg-4 col-md-4 col-sm-4 container align-items-center justify-content-center">
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control mb-1" name="name" placeholder="Ex: João da Silva" required>
                        <label for="floatingInputName">Nome</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control mb-1" name="email" placeholder="nome@exemplo.com" required>
                        <label for="floatingInputEmail">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control mb-1" name="password" placeholder="Senha" required>
                        <label for="floatingPassword">Senha</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control mb-1" name="password_confirmation" placeholder="Confirme sua Senha" required>
                        <label for="floatingPasswordConfirmation">Confirmar Senha</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-dark" type="submit">Cadastrar</button>
                    <p class="mt-5 mb-3 text-muted">©2021</p>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection