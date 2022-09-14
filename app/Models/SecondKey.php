<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'second_answer_id',
        'detail',
    ];

    public function secondAnswer()
    {
        return $this->belongsTo(SecondAnswer::class, 'second_answer_id');
    }
}
