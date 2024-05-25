<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Service;
use App\Models\Employee;


class AppointmentController extends Controller
{
    public function save_new(Request $req){
        $service        = Service::where('id',$req->service_id)->get();
        $client         = Client::where('id',$req->client_id)->get();
        $employee       = Employee::where('id',$req->employee_id)->get();
        $time_spent     = $service[0]->time_spent;
        $formatted_time = date("H:i", strtotime("$req->date $req->time"));
        $endtime        = date($formatted_time, strtotime($formatted_time." +".$time_spent." minutes",));
        $appointment                = new Appointment();
        $appointment->client_id     = $req->client_id;
        $appointment->employee_id   = $req->employee_id;
        $appointment->service_id    = $req->service_id;
        $appointment->client_name   = $client[0]->full_name;
        $appointment->employee_name = $employee[0]->full_name;
        $appointment->app_date      = date('d-m-Y H:i', strtotime("$req->date $formatted_time"));
        $appointment->app_to        = date('d-m-Y H:i', strtotime("$req->date $endtime"));
        $appointment->completed     = false;
        $appointment->save();

        return redirect('/agendar');
    }

    public function index(){
        $services  = Service::all();
        $employees = Employee::all();
        $clients   = Client::all();
        return view('agendar.index',compact('services','employees', 'clients'));
    }

    public function mark_as_complete($id){
        $result = Appointment::whereId($id)->update(['completed' => true]);
        return redirect('/admin');
    }

    public function get_appointment($id){
        $appointment = Appointment::get($id);
        $client = Client::get($appointment->client_id);

        return view('admin.index',compact('appointment','client'));
    }
}
