@extends('layouts.app')
@section('content')
<main class="text-center">
    <div class="container mt-5">
        <form method="POST" action="{{ route('login') }}">
        @csrf
        <img class="mb-2" src="/images/outlet.svg" alt="" width="80" height="65">
        <h1 class="h3 mb-3">Login</h1>

        <div class="col-md-4 container align-items-center justify-content-center">
            <div class="col">
                <div class="form-floating">
                    <input type="email" class="form-control mb-1" name="email" placeholder="nome@exemplo.com" required>
                    <label for="floatingInputEmail">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control mb-1" name="password" placeholder="Senha" required>
                    <label for="floatingPassword">Senha</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                    <input type="checkbox" name="remember" value="remember-me"> Continuar conectado
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-dark" type="submit">Entrar</button>
                <p class="mt-5 mb-3 text-muted">©2021</p>
            </div>
        </div>
        </form>
    </div>
</main>
@endsection