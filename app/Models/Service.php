<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = ['name', 'description', 'price', 'image'];

    public function event()
    {
        return $this->belongsTo(EventType::class, 'event_type_id', 'id');
    }
}
