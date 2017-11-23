<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = ['name', 'name_code'];

    public function departments()
    {
    	return $this->hasMany(Department::class);
    }
}
