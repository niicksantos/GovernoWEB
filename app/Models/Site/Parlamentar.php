<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Parlamentar extends Model
{
    protected $table = 'sitefox_vereador';

    protected $fillable = [
        'nome', 
        'idade', 
        'nascimento', 
        'naturalidade', 
        'estado_civil', 
        'ocupacao',
        'grau_de_instrucao',
        'email',
        'endereco',
        'tel_gabinete',
        'celular',
        'legislatura',
        'num_gabinete',
        'partido',
        'conteudo',
        'mesa_diretora',
        'cargo_mesa_diretora',
        'id_cargo',
        'qtd_votos',
        'imagem',
        'ativo',
        'exibir',
    ]; 

    public $timestamps = false;
}