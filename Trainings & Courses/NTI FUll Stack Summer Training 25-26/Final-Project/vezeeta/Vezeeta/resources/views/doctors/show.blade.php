<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تفاصيل الدكتور</title>
    <x-style />
    <style>
        body { background: #e2e6ea; font-family: 'Tajawal', sans-serif; }
        .card { border-radius: 12px; }
        .doctor-img { width: 120px; height: 120px; object-fit: cover; border-radius: 50%; }
        .service-badge { background: #eaf4ff; border-radius: 20px; padding: 6px 14px; margin: 4px; display: inline-block; font-size: 14px; color: #0070cd; border: 1px solid #0070cd; }
        .booking-box { background: white; border-radius: 12px; overflow: hidden; }
        .booking-header { background: #0070cd; color: white; padding: 2px; font-size: 14px; }
        .day-card { background: #f1f1f1; border-radius: 10px; padding: 10px; text-align: center; font-size: 14px; }
        .day-card .date { font-weight: bold; color: #fff; background: #0070cd; padding: 5px 10px; border-radius: 5px; }
        .time-slot { font-size: 13px; margin: 3px 0; }
        .reserve-btn { background: #e74c3c; color: #fff; border: none; border-radius: 6px; padding: 5px 15px; }
        .reserve-btn:hover { background: #c0392b; }
        .inf-img{ width: 20px; height: 20px; object-fit: cover; border-radius: 50%; margin-bottom: 5px; }

        /* الخلفية المعتمة */
        .overlay {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 1040;
        }

        /* الصندوق اللي هنركّز عليه */
        .booking-box.focused {
            position: relative;
            z-index: 1050;
            box-shadow: 0 0 25px rgba(0,0,0,0.6);
            transform: scale(1.02);
        }
    </style>
</head>
<body style="background: #e2e6ea;">
<x-navbar />

<div class="container py-4">
    <div class="row g-4">

        <!-- عمود اليمين (معلومات الدكتور) -->
        <div class="col-md-7">
            <div class="card shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <img src="{{ $doctor->profile_image ? asset('storage/' . $doctor->profile_image) : asset('images/default-doctor.png') }}" class="doctor-img" alt="Doctor">
                    <div>
                        <h5 class="fw-bold mb-1">{{ $doctor->name }}</h5>
                        <p class="text-muted mb-1">{{ $doctor->title }} - {{ $doctor->specialization }}</p>

                        @if(is_array($doctor->subspecialization))
                            @foreach($doctor->subspecialization as $sub)
                                <span class="badge bg-primary text-light">{{ $sub }}</span>
                            @endforeach
                        @else
                            <small class="text-primary">{{ $doctor->subspecialization }}</small>
                        @endif

                        <div class="mt-1 text-warning">
                            ★★★★★
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm p-3 mt-3">
                <h6 class="fw-bold mb-2">معلومات عن الدكتور</h6>
                <p class="mb-0">{{ $doctor->description ?? 'لا توجد معلومات متاحة.' }}</p>
            </div>

            <div class="card shadow-sm p-3 mt-3">
                <h6 class="fw-bold mb-2">الأعراض و الخدمات</h6>
                <div>
                    @foreach($doctor->services ?? [] as $service)
                        <span class="service-badge">{{ $service }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- عمود الشمال (معلومات الحجز) -->
        <div class="col-md-5">
            <div class="booking-box shadow-sm">
                <div class="booking-header text-center">معلومات الحجز</div>
                
                @foreach($doctor->clinics as $clinic)
                    <div id="bookingContent" class="p-3">
                        <p class="text-center" style="margin-bottom: 5px;">احجز</p>
                        <h6 class="text-primary text-center">كشف طبي</h6>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div class="text-center d-flex flex-column justify-content-center align-items-center">
                                <img class="inf-img" src="{{ asset('images/cash.png') }}" style="width:30px;height:30px;" alt="">
                                <p class="text-secondary" style="font-size:14px;">الكشف <span class="fw-bold">{{ $clinic->consultation_fee }} جنيه</span></p>
                            </div>
                            <div class="text-center d-flex flex-column justify-content-center align-items-center">
                                <img class="inf-img" src="{{ asset('images/V-Cash.svg') }}" alt="">
                                <p class="text-secondary" style="font-size:14px;">ستحصل على <span style="color:#60ba64;">٢٠٠ نقطة</span></p>
                            </div>
                            <div class="text-center d-flex flex-column justify-content-center align-items-center">
                                <img class="inf-img" src="{{ asset('images/waiting-time-blue.jpeg') }}" alt="">
                                <p class="text-primary" style="font-size:14px;">مدة الانتظار : <span>{{ $clinic->waiting_time }}</span></p>
                            </div>
                        </div>
                        <hr>
                        <p><i class="bi bi-geo-alt-fill text-danger"></i> {{ $clinic->city }} - {{ $clinic->address }}</p>
                        <hr>
                        <h6 class="fw-bold text-center mt-3">اختر ميعاد الحجز</h6>
                        <div class="d-flex justify-content-between">
                            @foreach($clinic->working_days as $day)
                                <div class="day-card flex-fill mx-1">
                                    <div class="date">{{ $day }}</div>
                                    <div class="time-slot" style="color:#0070cd; padding:20px 0 5px 0;">من 09:00 ص</div>
                                    <div class="time-slot" style="color:#0070cd; padding-bottom:20px;">حتى 10:00 م</div>
                                    <button class="reserve-btn w-100 mt-2 book-btn" data-day="{{ $day }}">احجز</button>
                                </div>
                            @endforeach
                        </div>
                        <hr>            
                        <p class="text-center text-muted">الحجز مسبقا و الدخول بأسبقية الحضور</p>
                        <hr>
                        <span class="d-block text-center">
                            <img src="{{ asset('images/footer.png') }}" alt="">
                        </span>
                    </div>

                    <!-- الفورم اللي هيظهر بعد الضغط -->
                    <div id="bookingFormContainer" class="p-3" style="display:none;">
                         <p class="text-center" style="margin-bottom: 5px;">احجز</p>
                        <h6 class="text-primary text-center">كشف طبي</h6>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div class="text-center d-flex flex-column justify-content-center align-items-center">
                                <img class="inf-img" src="{{ asset('images/cash.png') }}" style="width:30px;height:30px;" alt="">
                                <p class="text-secondary" style="font-size:14px;">الكشف <span class="fw-bold">{{ $clinic->consultation_fee }} جنيه</span></p>
                            </div>
                            <div class="text-center d-flex flex-column justify-content-center align-items-center">
                                <img class="inf-img" src="{{ asset('images/V-Cash.svg') }}" alt="">
                                <p class="text-secondary" style="font-size:14px;">ستحصل على <span style="color:#60ba64;">٢٠٠ نقطة</span></p>
                            </div>
                            <div class="text-center d-flex flex-column justify-content-center align-items-center">
                                <img class="inf-img" src="{{ asset('images/waiting-time-blue.jpeg') }}" alt="">
                                <p class="text-primary" style="font-size:14px;">مدة الانتظار : <span>{{ $clinic->waiting_time }}</span></p>
                            </div>
                        </div>
                        <hr>
                        <p><i class="bi bi-geo-alt-fill text-danger"></i> {{ $clinic->city }} - {{ $clinic->address }}</p>
                        <hr>
                        <h6 class="fw-bold text-center">ادخل بيانات الحجز</h6>
                        <form action="{{ route('book.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">اسم المريض</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="ادخل الاسم" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">رقم الموبايل</label>
                                <input type="tel" name="phone" id="phone" class="form-control" placeholder="010xxxxxxxx" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">البريد الإلكتروني</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="example@mail.com">
                            </div>
                            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                            <div class="mb-3">
                                <label for="insurance" class="form-label">التأمين</label>
                                <select name="insurance" id="insurance" class="form-select">
                                    <option value="">لا يوجد لدي تأمين مع الطبيب</option>
                                    <option value="مصر للتأمين">مصر للتأمين</option>
                                    <option value="الاهلي للخدمات الطبية">الاهلي للخدمات الطبية</option>
                                </select>
                            </div>

                            <!-- حقل اختيار الميعاد -->
                            <div class="mb-3">
                                <label for="slot" class="form-label">اختر الموعد</label>
                                <select name="slot" id="slot" class="form-select" required>
                                    @foreach($availableSlots as $slot)
                                        <option value="{{ $slot }}">{{ $slot }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-danger w-100">احجز</button>
                                <button type="button" id="cancelBooking" class="btn btn-secondary w-100">إلغاء</button>
                            </div>
                        </form>
                        <hr>            
                        <p class="text-center text-muted">الحجز مسبقا و الدخول بأسبقية الحضور</p>
                        <hr>
                        <span class="d-block text-center">
                            <img src="{{ asset('images/footer.png') }}" alt="">
                        </span>

                    </div>
                @endforeach

                @if($doctor->clinics->isEmpty())
                    <p class="text-muted p-3">لا توجد بيانات عيادة متاحة</p>
                @endif

            </div>
        </div>

    </div>
</div>

<div class="overlay" id="pageOverlay"></div>

<x-footer />
<x-script />

<script>
document.addEventListener("DOMContentLoaded", function() {
    const bookingContent = document.getElementById("bookingContent");
    const bookingForm = document.getElementById("bookingFormContainer");
    const cancelBtn = document.getElementById("cancelBooking");

    document.querySelectorAll(".book-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            bookingContent.style.display = "none";
            bookingForm.style.display = "block";
            bookingForm.scrollIntoView({ behavior: "smooth" });
        });
    });

    cancelBtn.addEventListener("click", function() {
        bookingForm.style.display = "none";
        bookingContent.style.display = "block";
    });

    // التركيز على مربع الحجز
    const bookingBox = document.querySelector(".booking-box");
    const overlay = document.getElementById("pageOverlay");

    bookingBox.addEventListener("click", function (e) {
        if (!e.target.closest("form")) {
            bookingBox.classList.add("focused");
            overlay.style.display = "block";
        }
    });

    overlay.addEventListener("click", function () {
        overlay.style.display = "none";
        bookingBox.classList.remove("focused");
    });
});
</script>
</body>
</html>
