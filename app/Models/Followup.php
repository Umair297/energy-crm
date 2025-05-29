<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    protected $fillable = ['deal_id', 'note', 'followup_date'];

    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }
}
