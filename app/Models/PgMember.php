<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PgMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'pjbl_group_id',
        'user_id',
        'is_leader',
    ];

    public function group()
    {
        return $this->belongsTo(PjblGroup::class, 'pjbl_group_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scores()
    {
        return $this->hasMany(PgwScore::class, 'pg_member_id');
    }

    public function evaluations()
    {
        return $this->hasMany(PgwEvaluation::class, 'pg_member_id');
    }
}
