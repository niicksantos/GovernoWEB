<?php

namespace App\Http\Controllers\Admin\configuracao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MensagemAlertaController extends Controller
{
    public function indexMensagem()
    {
        return view('admin.configuracao.msg_alerta');
    }
}
