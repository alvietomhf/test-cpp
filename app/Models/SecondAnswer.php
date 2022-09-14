<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_answer_id',
        'detail',
        'score',
        'nested',
    ];

    public function firstAnswer()
    {
        return $this->belongsTo(FirstAnswer::class, 'first_answer_id');
    }

    public function thirdAnswers()
    {
        return $this->hasMany(ThirdAnswer::class);
    }

    public function secondKeys()
    {
        return $this->hasMany(SecondKey::class);
    }
}
