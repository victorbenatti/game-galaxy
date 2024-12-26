@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark text-white">
                    <div class="card-header">{{ $produto->nome }}</div>

                    <div class="card-body">
                        <!-- Exibir imagem do produto -->
                        @if ($produto->imagem)
                            <img src="{{ asset('storage/'.$produto->imagem) }}" class="img-fluid mb-3" alt="Imagem do produto">
                        @else
                            <p>Sem imagem disponível</p>
                        @endif

                        <p class="card-text">{{ $produto->descricao }}</p>
                        <p class="card-text"><strong>R$ {{ $produto->preco }}</strong></p>

                        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
