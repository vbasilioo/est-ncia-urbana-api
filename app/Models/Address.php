<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'street',
        'city',
        'state',
        'zip_code',
        'country',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
