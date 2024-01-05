<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_detail extends Model
{
    use HasFactory;

    protected $table='employee_details';

    protected $fillable=[
        'userid',
        'emp_id',
        'emp_name',
        'email',
        'contact_no',
        'designation',
        'team_lead',
        'marketing_manager',
        'reporting_person'
    ];
}
