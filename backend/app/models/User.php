<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    protected $table = 'users';
    
    protected $fillable = [
        'username', 'email', 'password', 
    ];

    protected $hidden = [
        'password',
    ];


}
