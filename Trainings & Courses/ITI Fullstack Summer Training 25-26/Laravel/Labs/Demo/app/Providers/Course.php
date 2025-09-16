<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'description', 'code'];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function tracks(): BelongsToMany
    {
        return $this->belongsToMany(Track::class);
    }
}