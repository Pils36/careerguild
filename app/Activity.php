<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['ip_address', 'action', 'created_at', 'updated_at'];

    protected $table = "activity";
}
