<?php

namespace App\Http\Controllers;

use App\Models\Livros;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\LivroRepository;
use App\Services\ServiceHgBrasil;

class HomeController extends Controller
{
    private $livrosRepository;
    private $serviceHgbrasil;

    public function __construct()
    {
        $this->livrosRepository = new LivroRepository();
        $this->serviceHgbrasil = new ServiceHgBrasil();
    }

    public function index()
    {
        $livros = $this->livrosRepository->getLivrosRecemChegados();
        $totalLivros = Livros::count();
        $totalUsuarios = User::count();
        $consultaClimatica = $this->serviceHgbrasil->consultaClima();

        return view('home.index')->with(compact('livros', 'totalLivros', 'totalUsuarios', 'consultaClimatica'));
    }
}
