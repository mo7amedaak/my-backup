<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * الأعمدة اللي مسموح تعبئتها (Mass Assignment)
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'insurance',
        'slot',
        'doctor_id',
    ];

    /**
     * العلاقة بين الحجز والدكتور
     * كل حجز ينتمي لدكتور واحد
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
