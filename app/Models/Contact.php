<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['location_ar', 'location_en' ,'phone_1', 'phone_2'];
}
