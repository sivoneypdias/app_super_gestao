<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();

        return view('site.contato');
    }
}
