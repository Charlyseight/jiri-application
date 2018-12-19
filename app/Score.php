<?php

namespace Jiri;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['implement_id', 'user_id', 'comment', 'score'];
    public function implement(){
        return $this->belongsTo(Implement::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
