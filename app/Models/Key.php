<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer_id',
        'detail',
    ];

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
