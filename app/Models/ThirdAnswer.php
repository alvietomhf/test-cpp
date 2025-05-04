<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'second_answer_id',
        'assessment_subaspect_id',
        'detail',
        'score',
    ];

    public function secondAnswer()
    {
        return $this->belongsTo(SecondAnswer::class, 'second_answer_id');
    }

    public function assessmentSubaspect()
    {
        return $this->belongsTo(AssessmentSubaspect::class, 'assessment_subaspect_id');
    }

    public function thirdKeys()
    {
        return $this->hasMany(ThirdKey::class);
    }
}
