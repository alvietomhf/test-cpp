<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McqResultDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'mcq_result_id',
        'mc_question_id',
        'option_id',
        'correct',
        'score',
    ];

    public function result()
    {
        return $this->belongsTo(McqResult::class);
    }

    public function question()
    {
        return $this->belongsTo(McQuestion::class, 'mc_question_id');
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
