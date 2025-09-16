<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable=['name','address','image','age','email','gender'];
    public $timestamps=false;
}
