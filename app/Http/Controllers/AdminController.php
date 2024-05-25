<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Appointment;
use App\Models\Employee;
use App\Models\Service;

class AdminController extends Controller
{
    public function index(){
        $appointments     = Appointment::where('completed',false)->get();
        $employees        = Employee::all();
        $clients          = Client::all();
        $service          = Service::all();
        return view('admin.index',compact('appointments','employees', 'clients', 'service'));
    }
}
