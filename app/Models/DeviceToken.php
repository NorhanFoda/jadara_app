<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class DeviceToken extends Model
{
    protected $fillable = ['device_id', 'token', 'device_type'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
