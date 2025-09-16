<?php

namespace App\Http\Controllers;
use App\Models\Doctor;

use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * عرض فورم الحجز لدكتور معيّن
     */
    public function create($doctorId)
    {
        // كل المواعيد من 9 صباحًا حتى 10 مساء كل 30 دقيقة
        $allSlots = $this->generateSlots();

        // المواعيد المحجوزة للدكتور الحالي
        $booked = Booking::where('doctor_id', $doctorId)
            ->pluck('slot')
            ->toArray();

        // احذف المحجوز من كل المواعيد
        $availableSlots = array_diff($allSlots, $booked);

        return view('book.create', [
            'availableSlots' => $availableSlots,
            'doctorId'       => $doctorId,
        ]);
    }

    /**
     * حفظ بيانات الحجز
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'phone'      => 'required|string|max:20',
            'slot'       => 'required',
            'doctor_id'  => 'required|exists:doctors,id',
            'email'      => 'nullable|email',
            'insurance'  => 'nullable|string|max:255',
        ]);

        Booking::create([
            'name'      => $request->name,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'insurance' => $request->insurance,
            'slot'      => $request->slot,
            'doctor_id' => $request->doctor_id,
        ]);

        return redirect()
            ->back()
            ->with('success', 'تم الحجز بنجاح ✅');
    }

    /**
     * إنشاء قائمة المواعيد (نص ساعة من 9ص لـ 10م)
     */
    private function generateSlots(): array
    {
        $start = Carbon::createFromTime(9, 0);
        $end   = Carbon::createFromTime(22, 0);
        $slots = [];

        while ($start <= $end) {
            $slots[] = $start->format('H:i');
            $start->addMinutes(30);
        }

        return $slots;
    }
    public function show(Doctor $doctor)
{
    // 1️⃣ أنشئ جميع المواعيد من 9 صباحًا لـ 10 مساء كل نص ساعة
    $allSlots = [];
    $start = Carbon::createFromTime(9, 0);
    $end   = Carbon::createFromTime(22, 0);

    while ($start <= $end) {
        $allSlots[] = $start->format('H:i');
        $start->addMinutes(30);
    }

    // 2️⃣ هات المواعيد المحجوزة للدكتور الحالي
    $bookedSlots = Booking::where('doctor_id', $doctor->id)
        ->pluck('slot')
        ->toArray();

    // 3️⃣ شيل المحجوز من كل المواعيد
    $availableSlots = array_diff($allSlots, $bookedSlots);

    // 4️⃣ رجّع الـ view ومعاه كل المتغيرات
    return view('doctors.show', [
        'doctor'         => $doctor,
        'availableSlots' => $availableSlots,
    ]);
}

}
