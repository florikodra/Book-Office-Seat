<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
