<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['mc_question_id', 'title', 'correct'];

    public function question()
    {
        return $this->belongsTo(McQuestion::class);
    }
}
