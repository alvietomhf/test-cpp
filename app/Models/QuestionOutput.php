<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOutput extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'description',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
