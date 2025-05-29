<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $fillable = ['prospect_id', 'type', 'event_time', 'details'];

    public function prospect()
    {
        return $this->belongsTo(Prospect::class);
    }
}
