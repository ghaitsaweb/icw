<?php

namespace App;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
//use Notifiable, HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Crypt;

class User extends Authenticatable
{
    use Notifiable;
    //use Encryptable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','cabang_id','hak_akses','tandatangan','userstatus'
    ];

    public function cabang(){
        return $this->belongsTo('App\CabangModel');
    }
    // public function setPasswordAttribute($value){
    //     $this->attributes['password'] = Crypt::encrypt($value); 
    // }
   
    //    public function getPasswordAttribute($value){
    //      return $this->attributes['password'] = Crypt::decrypt($value); 
    // }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
