<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PgwEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'pg_work_id',
        'pg_member_id',
        'description',
    ];

    public function work()
    {
        return $this->belongsTo(PgWork::class, 'pg_work_id');
    }

    public function member()
    {
        return $this->belongsTo(PgMember::class, 'pg_member_id');
    }
}
