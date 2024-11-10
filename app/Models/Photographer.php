<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    protected $guarded = [];

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }
}
