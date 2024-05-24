<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function save_new(Request $req){
        $dados = $req->all();
        Service::create($dados);

        return view('register.service');
    }
}
