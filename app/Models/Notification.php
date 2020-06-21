<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'msg_ar',
        'msg_en',
        'image',
        'device_id',
        'read',
    ];
}
