<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'third_answer_id',
        'detail',
    ];

    public function thirdAnswer()
    {
        return $this->belongsTo(ThirdAnswer::class, 'third_answer_id');
    }
}
