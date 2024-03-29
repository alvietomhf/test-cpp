<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'competency_id',
        'description',
        'image',
        'output',
        'duration',
        'input',
    ];

    public function competency()
    {
        return $this->belongsTo(Competency::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function descriptions()
    {
        return $this->hasMany(Description::class);
    }
}
