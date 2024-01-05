<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    protected $table="users";

    protected $fillable=[
        'username',
        'password',
        'user_type',
        'status'
    ];

    public function hasModuleAccess($module)
    {
        // Check if the user has access to the specified module
        return $this->modules()->where('module_name', $module)->exists();
    }

    /**
     * Define the relationship between users and modules.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function modules()
    {
        return $this->belongsToMany(Module::class, 'modules_assigned_details', 'user_id', 'module_id');
    }
}
