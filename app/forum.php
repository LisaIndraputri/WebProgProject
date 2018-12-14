<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum extends Model
{
    //
    public function threads(){
        return $this->hasMany(Thread::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
