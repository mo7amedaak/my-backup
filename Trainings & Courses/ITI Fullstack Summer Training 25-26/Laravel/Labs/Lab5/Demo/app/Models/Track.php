<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    /** @use HasFactory<\Database\Factories\TrackFactory> */
    use HasFactory;
     protected $fillable=['name',"description","image"];
     public $timestamps=false;

     // track has many students
     public function students()
{
    return $this->hasMany(\App\Models\Student::class);
}

public function courses()
{
    return $this->hasMany(Course::class);
}

}
