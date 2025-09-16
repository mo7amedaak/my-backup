<?php

// app/Models/Review.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id', 'patient_name', 'rating', 'comment'
    ];

    // التقييم يخص دكتور
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}

