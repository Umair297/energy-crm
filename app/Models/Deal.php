<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = ['lead_id', 'status', 'final_amount'];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function followups()
    {
        return $this->hasMany(Followup::class);
    }

}
