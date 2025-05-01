<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'competency_id',
        'case',
        'question',
        'note',
        'difficulty',
        'score',
        'image',
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
