@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Adicionar Produto</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('produtos.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <textarea class="form-control" id="descricao" name="descricao" required>{{ old('descricao') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="preco">Preço</label>
                                <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="{{ old('preco') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="imagem">Imagem</label>
                                <input type="file" class="form-control" id="imagem" name="imagem">
                            </div>

                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
