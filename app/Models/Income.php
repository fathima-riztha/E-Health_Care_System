<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'total_appointments', // Add total_appointments here
        'month_name',
        'month_income',
        'date',
    ];
}
