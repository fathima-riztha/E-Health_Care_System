<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
{
    return $this->belongsTo(Doctor::class, 'doctor_id');
}
  
  public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
