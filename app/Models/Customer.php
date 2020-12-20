<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Customer extends Model
{
    use HasFactory, Notifiable;

   

    protected $fillable = [
        'customer_name',
        'customer_email',
        'password',
        'mobile',
        'provider', 
        'provider_id'
    ];

    protected $hidden = [
        'password','remember_token',
    ];
}
