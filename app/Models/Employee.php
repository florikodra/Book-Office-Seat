<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'payroll_no',
        'email',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
