<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $registros = Employee::all();
        return view ('admin.index',compact('registros'));
    }

    public function add()
    {
        return view('register.employee');
    }

    public function save_new(Request $req)
    {
        $dados = $req->all();
        Employee::create($dados);

        return view('register.employee');
    }

    public function edit($id){
        $registro = Employee::find($id);
        return view('admin.client.edit', compact('registro'));
    }

    public function update(Request $req, $id){
        $dados = $req -> all();

        Employee::find($id)->update($dados);

        return redirect()->route('admin.employees');
    }
}
