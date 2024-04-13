<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptoDevice extends Model
{
    protected $table = 'crypto_device';
    protected $primaryKey = 'crypto_device_id'; // Assuming 'crypto_device_id' is the primary key
    public $timestamps = false; // If 'crypto_device_registered_timestamp' field is not present

    // Define relationships
    public function user()
    {
        return $this->belongsTo(RegisteredUser::class, 'fk_user_id');
    }
}
