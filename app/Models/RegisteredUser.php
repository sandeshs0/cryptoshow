<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisteredUser extends Model
{
    protected $table = 'registered_user';
    protected $primaryKey = 'user_id'; // Assuming 'user_id' is the primary key
    public $timestamps = false; // If 'created_at' and 'updated_at' fields are not present

    // Specify fillable attributes
    protected $fillable = [
        'user_nickname',
        'user_name',
        'user_email',
        'user_hashed_password',
        'user_device_count',
        'user_registered_timestamp'
    ];

    // Define relationships
    public function devices()
    {
        return $this->hasMany(CryptoDevice::class, 'fk_user_id');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'user_event', 'fk_user_id', 'fk_event_id');
    }
}

