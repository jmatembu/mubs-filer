<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'name_code', 'faculty_id'];

    public function faculty()
    {
    	return $this->belongsTo(Faculty::class);
    }

    public function programs()
    {
    	return $this->hasMany(Program::class);
    }
}
