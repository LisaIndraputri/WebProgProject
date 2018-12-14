<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum extends Model
{
    //
    public function thread(){
        return $this->hasMany(Thread::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
