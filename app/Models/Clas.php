<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'season',
    ];

    public function students()
    {
        return $this->hasMany(User::class);
    }
}
