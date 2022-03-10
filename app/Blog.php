<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['subject', 'post_by', 'message', 'image', 'created_at', 'updated_at'];

    protected $table = "blog";
}
