<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $fillable = ['blog_id', 'name', 'message', 'created_at', 'updated_at'];

    protected $table = "blog_comment";
}
