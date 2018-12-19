<?php

namespace Jiri;

use Illuminate\Database\Eloquent\Model;

class Impression extends Model
{
    protected $fillable = ['user_id', 'student_id', 'jiri_id', 'impression_score', 'impression_comment'];
    public function judge(){
        return $this->belongsTo(User::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function jiri(){
        return $this->belongsTo(Jiri::class);
    }
}
