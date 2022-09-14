<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'description_id',
        'detail',
        'score',
        'nested',
    ];

    public function description()
    {
        return $this->belongsTo(Description::class);
    }

    public function secondAnswers()
    {
        return $this->hasMany(SecondAnswer::class);
    }

    public function firstKeys()
    {
        return $this->hasMany(FirstKey::class);
    }
}
