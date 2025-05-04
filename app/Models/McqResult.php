<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McqResult extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'score', 'is_timeup', 'timeup'];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->timezone('Asia/Jakarta')->format('d M y, H:i');
    }

    public function competency()
    {
        return $this->belongsTo(Competency::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resultDetails()
    {
        return $this->hasMany(McqResultDetail::class);
    }
}
