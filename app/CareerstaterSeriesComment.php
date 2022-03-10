<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerstaterSeriesComment extends Model
{
    protected $fillable = ['blog_id', 'name', 'message', 'created_at', 'updated_at'];

    protected $table = "career_starter_comment";
}
