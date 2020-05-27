<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'whatsapp' , 'chat', 
        'visit', 'meeting',
        'ticket', 'contact',
        'website', 'services', 
        'clients_area'
    ];
}
