<?php

namespace App\Http\Controllers\Admin\configuracoes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site\MsgAlerta;

class MsgAlertaController extends Controller
{
    public function indexMsg()
    {
        return view('admin.configuracoes.msg_alerta');
    }
} 
