<?php

namespace Jiri;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Student extends Model
{
    protected $fillable = ['name', 'email'];
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

    public function implementsForCurrentJiriWithProjectAndScores(){
        return $this->hasMany(Implement::class)
            ->with(['project', 'scores'])
            ->where('jiri_id', session('jiri_id'));
    }

}
