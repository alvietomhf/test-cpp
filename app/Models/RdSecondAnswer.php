<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RdSecondAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'rdfirst_answer_id',
        'second_answer_id',
        'correct',
    ];

    public function rdFirstAnswer()
    {
        return $this->belongsTo(RdFirstAnswer::class, 'rdfirst_answer_id');
    }

    public function secondAnswer()
    {
        return $this->belongsTo(SecondAnswer::class, 'second_answer_id');
    }

    public function rdThirdAnswers()
    {
        return $this->hasMany(RdThirdAnswer::class, 'rdsecond_answer_id');
    }
}
