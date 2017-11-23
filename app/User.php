<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'position', 'category', 'department_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function facilitators()
    {
        return $this->belongsToMany(Course::class)->withPivot('academic_year', 'semester', 'team_leader');
    }

    public function markers()
    {
        return $this->belongsToMany(Exam::class, 'markers')->withPivot('quantity');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
