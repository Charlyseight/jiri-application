<?php

namespace Jiri;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = ['jiri_id', 'person_id', 'person_type'];
}
