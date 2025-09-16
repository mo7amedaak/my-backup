<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id', 'clinic_name', 'city', 'address',
        'consultation_fee', 'waiting_time', 'working_hours'
    ];
    public function getWorkingDaysAttribute()
    {
        return $this->working_hours ? explode(',', $this->working_hours) : [];
    }
    // علاقة: العيادة بتتبع دكتور
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // علاقة: العيادة ممكن يبقى ليها صور
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}

