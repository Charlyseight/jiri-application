<?php

namespace Jiri;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function implements() {
        return $this->hasMany(Implement::class);
    }

    /*public function implementsForCurrentJiri(){
        return $this->hasMany(Implement::class)
            ->where('jiri_id', 1);
    }*/

    public function implementsForCurrentJiriWithProject(){
        return $this->hasMany(Implement::class)
            ->with('project')
            ->where('jiri_id', session('jiri_id'));
    }

    public function implementsForCurrentJiriWithProjectAndScore(){
        return $this->hasMany(Implement::class)
            ->with(['project', 'scoreForOneProject'])
            ->where('jiri_id', session('jiri_id'));
    }

}
