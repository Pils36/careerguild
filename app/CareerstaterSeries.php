<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerstaterSeries extends Model
{
    protected $fillable = ['subject', 'post_by', 'message', 'image', 'created_at', 'updated_at'];

    protected $table = "career_starter";
}
