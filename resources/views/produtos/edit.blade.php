@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="min-height: 400px; height: auto;">
                    <div class="card-header">Editar Produto</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('produtos.update', $produto->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $produto->nome) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <textarea class="form-control" id="descricao" name="descricao" required>{{ old('descricao', $produto->descricao) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="preco">Preço</label>
                                <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="{{ old('preco', $produto->preco) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="imagem">Imagem</label>
                                <input type="file" class="form-control" id="imagem" name="imagem">
                                @if ($produto->imagem)
                                    <div class="mt-2">
                                        <p>Imagem atual:</p>
                                        <img src="{{ asset('storage/'.$produto->imagem) }}" alt="Imagem do produto" width="100" class="img-thumbnail">
                                    </div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-warning w-100">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
