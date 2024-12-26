@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center bg-dark text-white">
        <h1 class="display-4">Sobre Nós</h1>
        <p class="lead">Saiba mais sobre nossa história e missão!</p>
        <hr class="my-4" style="border-color: #a900b8;">
        
        <div class="row justify-content-center">
            <div class="col-md-5">
                <img src="{{ asset('images/logo1.png') }}" alt="Minha Foto" class="img-fluid rounded-circle" style="width: 350px; height: auto; border-radius: 50%;">
            </div>
            <div class="col-md-7">
                <h3 style="font-weight: bold;">Quem somos?</h3>
                <p>A Game Galaxy é uma loja especializada em acessórios gamers de alta qualidade. Nossa missão é proporcionar aos jogadores as melhores opções para aprimorar sua experiência no mundo dos games.</p><br>
                <h3 style="font-weight: bold;">Visão</h3>
                <p>Ser a maior e melhor loja de acessórios gamers, oferecendo os melhores produtos e atendimento de qualidade.</p><br>
                <h3 style="font-weight: bold;">Valores</h3>
                <ul class="values-list">
                    <li>Compromisso com a qualidade</li>
                    <li>Inovação constante</li>
                    <li>Atendimento ao cliente com excelência</li>
                </ul>
            </div>
        </div>

        <hr class="my-4" style="border-color: #a900b8;">
        <a class="btn btn-danger btn-lg" href="{{ route('produtos.index') }}" role="button">Ver Produtos</a>
    </div>
@endsection
