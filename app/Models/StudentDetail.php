<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory;

    protected $table='student_details';

    protected $fillable=[
        'admission_no',
        'joining_date',
        'name',
        'course_id',
        'total_fee',
        'fee_paid',
        'contact_no',
        'email_id',
        'comments',
        'source_id',
        'certificate_status',
        'status'
    ];
}
