<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modules_assigned_detail extends Model
{
    use HasFactory;

    protected $table="modules_assigned_details";

    protected $fillable=['module_id','user_id'];
}
