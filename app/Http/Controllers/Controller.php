<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /*
     * Método que salva na sessão as mensagens de isert, update e delete
     */
    public function notificar($mensagem = '', $tipo = '')
    {
        $cor = 'success';
        $icone  = 'mdi-check-all';
        
        if ($tipo == 'erro') {
            $cor    = 'danger';
            $icone  = 'mdi-block-helper';
        }

        if ($tipo == 'atencao') {
            $cor    = 'warning';
            $icone  = 'mdi-alert';
        }

        session()->put('notificacao', $mensagem);
        session()->put('cor-notificacao', $cor);
        session()->put('icone-notificacao', $icone);
    }
}
