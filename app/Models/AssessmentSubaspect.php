<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentSubaspect extends Model
{
    use HasFactory;

    protected $fillable = ['assessment_aspect_id', 'name'];

    public function aspect()
    {
        return $this->belongsTo(AssessmentAspect::class, 'assessment_aspect_id');
    }
}
