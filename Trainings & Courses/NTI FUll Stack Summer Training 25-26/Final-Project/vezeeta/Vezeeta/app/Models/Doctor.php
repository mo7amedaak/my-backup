<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'title', 'specialization', 'subspecialization',
        'description', 'phone', 'email', 'profile_image'
    ];
    protected $casts = [
    'subspecialization' => 'array',
    ];


    // علاقة: الدكتور عنده عيادات كتير
    public function clinics()
    {
        return $this->hasMany(Clinic::class);
    }

    // علاقة: الدكتور عنده تقييمات كتير
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // علاقة: الدكتور عنده صور (شخصية + عيادات)
    public function images()
    {
        return $this->hasMany(Image::class);
    }

}

