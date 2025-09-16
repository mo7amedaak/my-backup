<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    use HasFactory;
    protected $fillable=['name','address','image','age','email','gender','track_id'];
    public $timestamps=false;
      // student has one track
      function track()
      {
        return $this->belongsTo(Track::class);
      }
}
