<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myuser extends Model
{
    use HasFactory;
    public function jobs(){
        return $this->belongsToMany(job::class,'myuser_job','job_id','myuser_id');
    }
}
