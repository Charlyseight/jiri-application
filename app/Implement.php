<?php

namespace Jiri;

use Illuminate\Database\Eloquent\Model;

class Implement extends Model
{
    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function scores(Score $score){
        return $this->hasMany(Score::class);
    }
}
