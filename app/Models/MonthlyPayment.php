<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyPayment extends Model
{
    protected $fillable = [
        'doctor_id',
        'doctor_name',
        'appointment_fee',
        'commission_amount',
        'month',
        'total_appointments',
        'doctor_payment',
    ];
}
