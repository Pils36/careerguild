<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['name', 'username', 'email', 'password', 'role', 'created_at', 'updated_at'];

    protected $table = "admin";
}
