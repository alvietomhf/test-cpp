<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RdFirstAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'result_description_id',
        'first_answer_id',
        'correct',
    ];

    public function resultDescription()
    {
        return $this->belongsTo(ResultDescription::class, 'result_description_id');
    }

    public function firstAnswer()
    {
        return $this->belongsTo(FirstAnswer::class, 'first_answer_id');
    }

    public function rdSecondAnswers()
    {
        return $this->hasMany(RdSecondAnswer::class, 'rdfirst_answer_id');
    }
}
