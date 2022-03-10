<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'position', 'facebook', 'twitter', 'instagram', 'youtube', 'image', 'created_at', 'updated_at'];

    protected $table = "team";
}
