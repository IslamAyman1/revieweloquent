<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable=['role_name','user_id','created_at'];
    public function users(){
        return $this->belongsToMany(User::class,'role_user')->withTimestamps();
    }
}
