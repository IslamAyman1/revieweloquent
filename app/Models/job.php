<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;
    public function jobs(){
        return $this->belongsToMany(myuser::class,'myuser_job','myuser_id','job_id');
    }
}
