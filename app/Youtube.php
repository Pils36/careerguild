<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    protected $fillable = ['url', 'created_at', 'updated_at'];

    protected $table = "youtube";
}
