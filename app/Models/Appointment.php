<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'service_id','client_id','employee_id','payment_id', 'client_name', 'employee_name', 'app_date','app_to', 'completed'
    ];
}
