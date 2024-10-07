<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class many1 extends Model
{
    use HasFactory;
    public function many2(){
        return $this->belongsToMany(many2::class,'many1_many2');
    }
}
