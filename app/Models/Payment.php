<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Payment extends Model
{

    use HasFactory;
    use Notifiable;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
{
    return $this->belongsTo(Doctor::class, 'doctor_id');
}


   public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
