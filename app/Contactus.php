<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    protected $fillable = ['name', 'email', 'phone_number', 'subject', 'message', 'created_at', 'updated_at'];

    protected $table = "contactus";
}
