<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'result_id',
        'question_id',
        'answer',
        'score',
        'timeup',
        'is_timeup',
    ];

    public function result()
    {
        return $this->belongsTo(Result::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function resultDetailAnswers()
    {
        return $this->hasMany(ResultDetailAnswer::class);
    }
}
