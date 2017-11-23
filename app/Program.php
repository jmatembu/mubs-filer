<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['name', 'name_code', 'department_id'];

    public function department()
    {
    	return $this->belongsTo(Department::class);
    }

    public function courses()
    {
    	return $this->hasMany(Course::class);
    }
}
