<?php

namespace Jiri;

use Illuminate\Database\Eloquent\Model;

class Implement extends Model
{
    protected $fillable = ['student_id', 'project_id', 'jiri_id'];
    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function scores(){
        return $this->hasMany(Score::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function scoreForOneProject(){
        return $this->hasMany(Score::class)->where('user_id', auth()->id());
    }
}
