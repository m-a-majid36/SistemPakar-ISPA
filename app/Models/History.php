<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function symptom()
    {
        return $this->belongsTo(Symptom::class);
    }

    public function diseases()
    {
        return $this->belongsToMany(Disease::class);
    }
}
