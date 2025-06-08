<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PjblGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'clas_id',
        'pjbl_question_id',
        'name',
        'max_member',
    ];

    public function clas()
    {
        return $this->belongsTo(Clas::class, 'clas_id');
    }

    public function question()
    {
        return $this->belongsTo(PjblQuestion::class, 'pjbl_question_id');
    }

    public function members()
    {
        return $this->hasMany(PgMember::class, 'pjbl_group_id');
    }
}
