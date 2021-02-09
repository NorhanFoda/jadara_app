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
        'clients_area', 'email', 'email2',
        'contact_title', 'contact_subtitle', 
        'contact_description', 'contact_image'
    ];
}
