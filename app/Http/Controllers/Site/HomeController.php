<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site\Slider;



class HomeController extends Controller
{
    

    public function IndexSite() {

        $contslider = 0;
        $slider = Slider::all() ->where('exibir', 1);

        return view('site.home', ['contslider' => $contslider,  'slider' => $slider]);
    }





}
