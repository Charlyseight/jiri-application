<?php

namespace Jiri;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function implement(){
        return $this->belongsTo(Implement::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
