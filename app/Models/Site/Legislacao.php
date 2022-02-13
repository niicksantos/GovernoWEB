<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Legislacao extends Model
{
    protected $table = 'sitefox_legislacao';

    protected $fillable = [
        'id', 
        'titulo', 
        'data_atualizacao', 
        'texto', 
        'arquivo', 
        'id_tipo',
        'ativo',
        'ementa',
        'indexacao',
        'id_situacao',
        'id_vereador',
    ]; 


    public $timestamps = false;
}
