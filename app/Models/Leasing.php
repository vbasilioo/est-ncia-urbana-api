<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leasing extends Model
{
    use HasUuids, SoftDeletes;

    protected $table = 'leases';

    protected $fillable = [
        'start_date',
        'end_date',
        'monthly_rent',
        'status',
        'property_id',
        'tenant_id',
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function tenant(){
        return $this->belongsTo(User::class);
    }
}
