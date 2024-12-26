@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center bg-dark text-white">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="logo-img" style="height: 250px; width: auto;">
        <h1 class="display-4">Bem-vindo à Game Galaxy!</h1>
        <p class="lead">Encontre os melhores acessórios gamers aqui!</p>
        <hr class="my-4" style="border-color: #a900b8;">
        <p>Confira nossa seleção de produtos e escolha os melhores acessórios para aprimorar sua experiência de jogo.</p>
        <a class="btn btn-danger btn-lg" href="{{ route('produtos.index') }}" role="button">Ver Produtos</a>
    </div>
@endsection
