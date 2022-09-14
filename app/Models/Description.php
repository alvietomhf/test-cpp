<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'detail',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function firstAnswers()
    {
        return $this->hasMany(FirstAnswer::class);
    }
}
