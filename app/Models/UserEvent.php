<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model
{
    protected $table = 'user_event';
    public $timestamps = false; // Assuming no timestamps are needed
    protected $primaryKey = null; // Assuming no primary key

    // Define relationships
    public function user()
    {
        return $this->belongsTo(RegisteredUser::class, 'fk_user_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'fk_event_id');
    }
}
