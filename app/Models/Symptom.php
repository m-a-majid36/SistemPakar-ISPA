<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];
    protected $fillable = ['id', 'name', 'description'];

    public function diseases()
    {
        return $this->belongsToMany(Disease::class)->withPivot('score');
    }

    public function reasons()
    {
        return $this->belongsToMany(Reason::class);
    }

    public function treatments()
    {
        return $this->belongsToMany(Treatment::class);
    }
}
