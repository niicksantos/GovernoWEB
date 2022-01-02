<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site\Slider;
use App\Models\Site\Noticia;



class HomeController extends Controller
{
    
    public function HomeSite() {
        return redirect()->route('home');
    }

    public function IndexSite() {

        $contslider = 0;
        $slider = Slider::all() ->where('exibir', 1);
        $noticia = Noticia::all()->sortByDesc('id')
                                 ->take(5)
                                 ->skip(1);

        $destaque = Noticia::all() ->where('destaque', 1);


        return view('site.home', ['contslider' => $contslider,
                                  'slider' => $slider,
                                  'destaque' => $destaque,
                                  'noticia' =>$noticia 
                                
                                    ]);

        



    }





}
