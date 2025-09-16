<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'name', 'address', 'image', 'age', 'email', 'gender', 'track_id', 'password'
    ];

    public $timestamps = false;

    // student belongs to one track
    public function track()
    {
        return $this->belongsTo(Track::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
