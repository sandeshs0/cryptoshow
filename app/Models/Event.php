<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $primaryKey = 'event_id'; // Assuming 'event_id' is the primary key
    public $timestamps = false; // If 'event_date' field is not present

    // Define relationships
    public function users()
    {
        return $this->belongsToMany(RegisteredUser::class, 'user_event', 'fk_event_id', 'fk_user_id');
    }
}
