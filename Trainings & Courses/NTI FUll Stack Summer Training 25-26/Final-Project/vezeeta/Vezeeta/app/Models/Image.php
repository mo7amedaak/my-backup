<?php

// app/Models/Image.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id', 'clinic_id', 'type', 'image_url'
    ];

    // الصورة تخص دكتور
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // أو تخص عيادة
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
