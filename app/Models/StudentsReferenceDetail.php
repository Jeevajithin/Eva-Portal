<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsReferenceDetail extends Model
{
    use HasFactory;

    protected $table='students_reference_details';

    protected $fillable=[
        'studentid',
        'employee_id',
        'total_fee',
        'fee_paid',
        'type'
    ];
}
