<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsTechnologyDetail extends Model
{
    use HasFactory;

    protected $table="students_technology_details";

    protected $fillable=[
        'studentid',
        'technology_id'
    ];
}
