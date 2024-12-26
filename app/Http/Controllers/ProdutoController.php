<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProdutoController extends Controller
{
    // Listar produtos (acessível a todos)
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function __construct() 
    { 
        $this->middleware('auth')->except(['index', 'show']);
    }

    // Mostrar um produto específico (acessível a todos)
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    // Formulário de criação (apenas autenticados)
    public function create()
    {
        return view('produtos.create');
    }


    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação para o arquivo de imagem
        ]);

        // Lidar com o upload da imagem
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            // Armazenar a imagem no diretório 'produtos' dentro do diretório 'storage/app/public'
            $imagePath = $request->file('imagem')->store('produtos', 'public');
        } else {
            $imagePath = null; // Caso não haja imagem, deixa o caminho como nulo
        }

        // Criar o novo produto, incluindo o caminho da imagem
        Produto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'imagem' => $imagePath, // Armazenando o caminho da imagem
        ]);

        // Redirecionar para a lista de produtos com uma mensagem de sucesso
        return redirect()->route('produtos.index')
                         ->with('success', 'Produto criado com sucesso.');
    }



    // Formulário de edição (apenas autenticados)
    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    // Atualizar produto (apenas autenticados)
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Atualiza o produto com os dados do formulário, exceto a imagem
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;

        // Verifica se uma nova imagem foi enviada
        if ($request->hasFile('imagem')) {
            // Exclui a imagem antiga se existir
            if ($produto->imagem) {
                Storage::delete('public/'.$produto->imagem);
            }

            // Armazena a nova imagem
            $imagemPath = $request->file('imagem')->store('produtos', 'public');
            $produto->imagem = $imagemPath;
        }

        $produto->save();

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto atualizado com sucesso.');
    }

    // Deletar produto (apenas autenticados)
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
                        ->with('success', 'Produto deletado com sucesso.');
    }
}
