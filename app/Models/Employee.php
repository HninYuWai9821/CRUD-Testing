<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'type_id'];

    protected $with = ['employeeType'];

    public function employeeType()
    {
        return $this->belongsTo(EmployeeType::class);
    }
}

