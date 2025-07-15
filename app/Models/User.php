<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'role_id',
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     * 
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'permissions' => 'array'
    ];
    public function hasPermission($permissions){
         foreach($permissions as $permission){
            if(!in_array($permission,$this->permissions)){
                return false;
            }
         }
         return true;
    }  
      public function phone(){    
       return $this->hasOne(phone::class);
    }
    public function Role(){
        return $this->belongsTo(Role::class,'role_id');
    } 
    public function hasRole($role){
      return $this->Role->role_name === $role;
    }

    // public function roles(){
    //     return $this->belongsToMany(Role::class,'role_user');
    // }
    // protected function Name():Attribute{
    //     return Attribute::make(
    //         get:fn($value)=>strtoupper($value),
    //         set:fn($value)=>strtoupper($value)
    //     );
    // }
}
