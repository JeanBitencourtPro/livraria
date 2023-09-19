<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Livros extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'user_id', 'titulo', 'descricao', 'autor', 'numero_paginas'
    ];

    public function getLivros()
    {
        return DB::table('livros')->paginate(2);
    }

    public function getLivrosComBusca($buscaComParametros)
    {
        return DB::table('livros')->where('titulo', 'like', '%' . $buscaComParametros . '%')->paginate(2);
    }

    public function getLivrosRecemChegados()
    {
        return DB::table('livros')->orderBy('id', 'DESC')->limit(5)->get();
    }

    public static function inserir($dadosLivro)
    {
        $livro = new Livros();
        $livro->fill($dadosLivro);
        $livro->save();

        return $livro;
    }

    public static function editar($livroId, $dadosLivro)
    {
        return Livros::where('id', $livroId)->update([
            'user_id' => $dadosLivro['user_id'],
            'titulo' => $dadosLivro['titulo'],
            'descricao' => $dadosLivro['descricao'],
            'autor' => $dadosLivro['autor'],
            'numero_paginas' => $dadosLivro['numero_paginas']
        ]);
    }
}
