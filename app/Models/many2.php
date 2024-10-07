<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class many2 extends Model
{
    use HasFactory;
    public function many1(){
        return $this->belongsToMany(many1::class,'many1_many2');
    }
}
