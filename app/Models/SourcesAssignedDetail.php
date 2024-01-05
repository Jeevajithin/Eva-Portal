<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SourcesAssignedDetail extends Model
{
    use HasFactory;

    protected $table="sources_assigned_details";

    protected $fillable=['source_id','user_id'];
}
