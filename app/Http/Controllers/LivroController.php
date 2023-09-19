<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLivroRequest;
use App\Models\Livros;
use App\Repositories\LivroRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LivroController extends Controller
{
    private $livrosRepository;
    public function __construct()
    {
        $this->livrosRepository = new LivroRepository();
    }

    public function index()
    {
        $livros = $this->livrosRepository->getLivrosCadastrados();

        return view('livros.index')->with(compact('livros'));
    }

    public function cadastrar()
    {
        $livro = new Livros();

        return view('livros.add')->with(compact('livro'));
    }

    public function salvar(StoreLivroRequest $request)
    {
        try {
            $this->livrosRepository->novoLivro($request->all());
            $this->notificar('Dados salvos com sucesso!');
        } catch (Exception $e) {
            $this->notificar('Erro ao tentar salvar livro. Erro: ' . $e->getMessage(), 'erro');
        }

        return Redirect::route('Livros');
    }

    public function editar($livroId)
    {
        $livro = Livros::find($livroId);

        return view('livros.add')->with(compact('livro'));
    }

    public function excluir($livroId)
    {
        try {
            Livros::where('id', $livroId)->delete();
            $this->notificar('Livro excluído com sucesso!');
        } catch (Exception $e) {
            $this->notificar('Erro ao tentar excluir livro. Erro: ' . $e->getMessage(), 'erro');
        }

        return response(['success'=> true], 200);
    }
}
