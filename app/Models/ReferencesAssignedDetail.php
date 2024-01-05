<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferencesAssignedDetail extends Model
{
    use HasFactory;

    protected $table="references_assigned_details";

    protected $fillable=['reference_id','user_id'];
}
