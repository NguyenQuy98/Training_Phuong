<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const TYPE_ADMIN = 0;
	const TYPE_USER = 1;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getAdmins()
	{
		$admin = User::where('Type',0)->get();
		return $admin;
	}

	public function getUsers()
	{
		$user = User::where('Type',1)->get();
		return $user;
	}
}
