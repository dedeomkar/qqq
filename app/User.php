<?php

namespace App;
 
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    
    public function routeNotificationForKarix()
    {
    return  $this->name;
    }

    public function getJWTIdentifier(){
        return $this->getKey();
    }
    public function getJWTCustomClaims(){
        return [];
    }

}
