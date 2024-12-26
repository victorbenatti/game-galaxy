@extends('layouts.app')

@section('content')
    <h1>Produtos</h1>
    @auth
        <a href="{{ route('produtos.create') }}" class="btn btn-primary mb-3">Adicionar Produto</a>
    @endauth
    <div class="row">
        @foreach($produtos as $produto)
            <div class="col-md-4 mb-3">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto->nome }}</h5>
                        <p class="card-text">{{ $produto->descricao }}</p>
                        <p class="card-text"><strong>R$ {{ $produto->preco }}</strong></p>
                        
                        @if ($produto->imagem)
                            <img src="{{ asset('storage/'.$produto->imagem) }}" alt="Imagem do produto" width="100">

                        @else
                            <p>Sem imagem disponível</p>
                        @endif
                        
                        <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-secondary">Ver</a>
                        @auth
                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning mr-2">Editar</a>
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
