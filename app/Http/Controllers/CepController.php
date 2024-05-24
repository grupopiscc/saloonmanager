<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function get_cep(Request $req){
        $cep = $req->cep;
        $response = Http::get('https://viacep.com.br/ws/'.$cep.'/json');
        return compact('response');
    }
}
