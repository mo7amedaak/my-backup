<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'track_id', 'code'];

    public function track()
{
    return $this->belongsTo(Track::class);
}

    public function students()
{
    return $this->belongsToMany(Student::class);
}

}
