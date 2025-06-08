<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PjblQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'competency_id',
        'description',
        'case',
    ];

    public function competency()
    {
        return $this->belongsTo(Competency::class);
    }
}
