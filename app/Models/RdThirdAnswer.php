<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RdThirdAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'rdsecond_answer_id',
        'third_answer_id',
        'correct',
    ];

    public function rdSecondAnswer()
    {
        return $this->belongsTo(RdSecondAnswer::class, 'rdsecond_answer_id');
    }

    public function thirdAnswer()
    {
        return $this->belongsTo(ThirdAnswer::class, 'third_answer_id');
    }
}
