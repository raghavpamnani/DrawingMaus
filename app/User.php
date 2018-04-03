<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'email', 'password', 'phone', 'landline', 'gender', 'dob', 'address', 'avatar',
    ];

    // public function setPasswordAttribute($value)
    // {
        // $this->attributes['password'] = bcrypt($value);
    // }
	
	public function setPasswordAttribute($password){
		$this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
	}
	
	
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
}
