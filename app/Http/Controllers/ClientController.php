<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $registros = Client::all();
        return view ('admin.index',compact('registros'));
    }

    public function add()
    {
        return view('register.index');
    }

    public function save_new(Request $req)
    {
        $dados = $req->all();
        Client::create($dados);

        return view('register.index');
    }

    public function edit($id){
        $registro = Client::find($id);
        return view('admin.client.edit', compact('registro'));
    }

    public function update(Request $req, $id){
        $dados = $req -> all();

        Client::find($id)->update($dados);

        return redirect()->route('admin.clients');
    }
}
