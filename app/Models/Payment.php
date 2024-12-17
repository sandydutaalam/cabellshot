<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'payment_proof_type'
    ];

    public function booking()
{
    return $this->belongsTo(Booking::class);
}
}
