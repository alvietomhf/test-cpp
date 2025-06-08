<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PgwProblem extends Model
{
    use HasFactory;

    protected $fillable = [
        'pg_work_id',
        'desc_1',
        'desc_2',
        'desc_3',
    ];

    public function work()
    {
        return $this->belongsTo(PgWork::class, 'pg_work_id');
    }
}
