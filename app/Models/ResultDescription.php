<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'result_detail_id',
        'description_id',
    ];

    public function resultDetail()
    {
        return $this->belongsTo(ResultDetail::class, 'result_detail_id');
    }

    public function description()
    {
        return $this->belongsTo(Description::class);
    }

    public function rdFirstAnswers()
    {
        return $this->hasMany(RdFirstAnswer::class);
    }
}
