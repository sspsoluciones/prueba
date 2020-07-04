<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'firma_id', 'telefono',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //scope
    public function scopeName($query, $name){
        if($name)
            return $query->where('name', 'LIKE', "%$name%");
    }

    public function scopeEmail($query, $email){
        if($email)
            return $query->where('email', 'LIKE', "%$email%");
    }

    public function scopeRole_ID($query, $role_id){
        if($role_id)
            return $query->where('role_id', 'LIKE', "%$role_id%");
    }


    public function scopeFirma_ID($query, $firma_id){
        if($firma_id)
            return $query->where('firma_id', 'LIKE', "%$firma_id%");
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role(){
        return $this->belongsTo('App\Role');
        return $this->hasMany("App\Role");
    }

    public function firma(){
        return $this->belongsTo('App\Firma');
        return $this->hasMany("App\Firma");
    }

    public function esAdmin(){

        if($this->role->nombre=='administrador'){
            return true;
        }

        return false;

    }


    public function esContador(){

        if($this->role->nombre=='contador' or $this->role->nombre=='demo'){
            return true;
        }

        return false;

    }


    public function noEsEditor(){

        if($this->role->nombre=='analista'){
            return true;
        }

        return false;

    }


}
