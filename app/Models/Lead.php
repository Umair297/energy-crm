<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
protected $fillable = [
    'prospect_id',
    'commission',
    'assignee_commission',
];

    public function prospect()
{
    return $this->belongsTo(Prospect::class);
}
public function deal()
{
    return $this->hasOne(Deal::class);
}


}
