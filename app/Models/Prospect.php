<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;

    protected $casts = [
    'business_address' => 'array',
    'limited_company' => 'array',
    'limited_company_number' => 'array',
    'charity' => 'array',
    'sole_trader' => 'array',
    'current_supplier_gas' => 'array',
    'current_supplier_electricity' => 'array',
    'contract_end_date_gas' => 'array',
    'contract_end_date_electricity' => 'array',
    'mprn_number' => 'array',
    'mpan_number' => 'array',
    'eac' => 'array',
    'aq' => 'array',
];

    
    public function feeds()
{
    return $this->hasMany(Feed::class);
}
public function lead()
{
    return $this->hasOne(Lead::class);
}



}
