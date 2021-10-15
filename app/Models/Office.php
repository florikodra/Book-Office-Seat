<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'no_seats',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
