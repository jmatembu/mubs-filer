<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'name_code'];

    public function program()
    {
    	return $this->belongsTo(Program::class);
    }

    public function facilitators()
    {
    	return $this->belongsToMany(User::class, 'facilitators')->withPivot('academic_year', 'semester', 'team_leader');
    }

    public function exams()
    {
    	return $this->hasMany(Exam::class);
    }
}
