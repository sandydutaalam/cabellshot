<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $table = 'event_types';
    protected $fillable = ['type'];

    // Define the many to many relationship with the Photographer model
    public function photographers()
    {
        return $this->belongsToMany(User::class, 'event_type_photographer', 'event_type_id', 'user_id');
    }
}
