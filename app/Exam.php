<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Exam extends Model implements HasMedia
{
	use HasMediaTrait;

    protected $fillable = ['academic_year', 'semester', 'exam_schedule', 'exam_type', 'course_id', 'examiner', 'status', 'attendance', 'performance_analysis', 'approved_by', 'approved_at'];

    protected $dates = ['exam_schedule'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'performance_analysis' => 'array',
    ];

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function markers()
    {
    	return $this->belongsToMany(User::class, 'markers')->withPivot('quantity');
    }

    public function getExamTypeAttribute($value)
    {
    	$examType = 'Final Examination';
    	
    	if ($value === 'cw1') {
    		$examType = 'Coursework One';
    	} else if ($value === 'cw2') {
    		$examType = 'Coursework Two';
    	}

    	return $examType;
    }
}
