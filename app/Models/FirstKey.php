<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_answer_id',
        'detail',
    ];

    public function firstAnswer()
    {
        return $this->belongsTo(FirstAnswer::class, 'first_answer_id');
    }
}
