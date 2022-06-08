<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultDetailAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'result_detail_id',
        'answer_id',
        'correct',
    ];

    public function resultDetail()
    {
        return $this->belongsTo(ResultDetail::class, 'result_detail_id');
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
