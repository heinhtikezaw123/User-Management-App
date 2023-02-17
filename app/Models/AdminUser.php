<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class AdminUser extends Model
{
    use HasFactory;

    protected $fillable = ['name','user_name','role_id','phone','email','password','gender','is_active'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
