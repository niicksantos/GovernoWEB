<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = 'sitefox_post';

    protected $fillable = [
        'data', 
        'titulo', 
        'chamada', 
        'id_categoria', 
        'texto', 
        'capa',
        'youtube',
        'audio',
        'exibir',
        'destaque',
        'url',
        'ativo',
    ]; 

    public $timestamps = false;
}
