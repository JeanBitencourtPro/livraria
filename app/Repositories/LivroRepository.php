<?php

namespace App\Repositories;

use App\Models\Livros;
use Illuminate\Support\Facades\Auth;

class LivroRepository 
{
    private $livrosModel;
    public function __construct()
    {
        $this->livrosModel = new Livros();
    }

    public function getLivrosRecemChegados()
    {   
        return $this->livrosModel->getLivrosRecemChegados();
    }

    public function getLivrosCadastrados()
    {
        $busca = request()->get('buscar');
        
        if ($busca != 'false') {
            return $this->livrosModel->getLivrosComBusca($busca);
        }

        request()->merge(['buscar' =>  null]);
        
        return $this->livrosModel->getLivros();
    }

    public function novoLivro($livro)
    {
        $dados = [
            'titulo' => $livro['titulo'],
            'autor' => $livro['autor'],
            'numero_paginas' => $livro['numero_paginas'],
            'descricao' => $livro['descricao'],
            'user_id' => Auth::user()->id
        ];

        if ($livro['id']) {
            return $this->livrosModel->editar($livro['id'], $dados);
        }

        return $this->livrosModel->inserir($dados);
    }
}