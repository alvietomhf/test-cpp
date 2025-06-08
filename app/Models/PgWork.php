<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PgWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'pjbl_group_id',
        'pjbl_phase_id',
        'file',
        'status',
    ];

    public function group()
    {
        return $this->belongsTo(PjblGroup::class, 'pjbl_group_id');
    }

    public function phase()
    {
        return $this->belongsTo(PjblPhase::class, 'pjbl_phase_id');
    }

    public function problems()
    {
        return $this->hasMany(PgwProblem::class);
    }

    public function scores()
    {
        return $this->hasMany(PgwScore::class);
    }
    
    public function evaluations()
    {
        return $this->hasMany(PgwEvaluation::class);
    }

    public function reflections()
    {
        return $this->hasMany(PgwReflection::class);
    }
}
