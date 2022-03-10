<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = ['event_name', 'event_start_time', 'event_end_time', 'event_start_date', 'event_end_date', 'event_description', 'event_url', 'status', 'image_url', 'created_at', 'updated_at'];

    protected $table = "event";
}
