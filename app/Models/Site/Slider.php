<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sitefox_slider';

    protected $fillable = [
        'titulo', 'chamada', 'foto',
    ]; 

    public $timestamps = false;
    
}
