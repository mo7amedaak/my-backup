<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تعديل بيانات الطبيب</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body { background: #f8fafc; font-family: 'Tajawal', sans-serif; }
        .page-header {
            background: linear-gradient(135deg, #0d6efd, #3b82f6);
            color: #fff;
            padding: 1.5rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
        }
        .card { border-radius: 1rem; }
        .doctor-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ddd;
        }
    </style>
</head>
<body>
<x-navbar />

<div class="container py-5">
    <!-- Header -->
    <div class="page-header shadow-sm d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold">تعديل بيانات الطبيب</h2>
            <p class="mb-0">يمكنك تعديل بيانات الطبيب وحفظ التغييرات</p>
        </div>
        <a href="{{ route('admin.doctors.index') }}" class="btn btn-light">رجوع</a>
    </div>

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3 text-center">
                <img src="{{ $doctor->profile_image ? asset('storage/'.$doctor->profile_image) : 'https://via.placeholder.com/120' }}" 
                     alt="{{ $doctor->name }}" class="doctor-img mb-3">
                <p class="text-muted small">الصورة الحالية للطبيب</p>
            </div>

            <div class="mb-3">
                <label class="form-label">اسم الطبيب</label>
                <input type="text" name="name" class="form-control" value="{{ $doctor->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">المسمى الوظيفي</label>
                <input type="text" name="title" class="form-control" value="{{ $doctor->title }}">
            </div>

            <div class="mb-3">
                <label class="form-label">التخصص</label>
                <select name="specialization" class="form-select" required>
                    <option value="" disabled>اختر التخصص</option>
                    <option value="جلدية" {{ $doctor->specialization == 'جلدية' ? 'selected' : '' }}>جلدية</option>
                    <option value="اسنان" {{ $doctor->specialization == 'اسنان' ? 'selected' : '' }}>اسنان</option>
                    <option value="نفسي" {{ $doctor->specialization == 'نفسي' ? 'selected' : '' }}>نفسي</option>
                    <option value="اطفال وحديثي الولادة" {{ $doctor->specialization == 'اطفال وحديثي الولادة' ? 'selected' : '' }}>اطفال وحديثي الولادة</option>
                    <option value="مخ واعصاب" {{ $doctor->specialization == 'مخ واعصاب' ? 'selected' : '' }}>مخ واعصاب</option>
                    <option value="عظام" {{ $doctor->specialization == 'عظام' ? 'selected' : '' }}>عظام</option>
                    <option value="نساء وتوليد" {{ $doctor->specialization == 'نساء وتوليد' ? 'selected' : '' }}>نساء وتوليد</option>
                    <option value="انف واذن وحنجرة" {{ $doctor->specialization == 'انف واذن وحنجرة' ? 'selected' : '' }}>انف واذن وحنجرة</option>
                    <option value="قلب واوعية دموية" {{ $doctor->specialization == 'قلب واوعية دموية' ? 'selected' : '' }}>قلب واوعية دموية</option>
                    <option value="الآشعة التداخلية" {{ $doctor->specialization == 'الآشعة التداخلية' ? 'selected' : '' }}>الآشعة التداخلية</option>
                    <option value="امراض دم" {{ $doctor->specialization == 'امراض دم' ? 'selected' : '' }}>امراض دم</option>
                    <option value="اورام" {{ $doctor->specialization == 'اورام' ? 'selected' : '' }}>اورام</option>
                    <option value="باطنة" {{ $doctor->specialization == 'باطنة' ? 'selected' : '' }}>باطنة</option>
                    <option value="تخسيس وتغذية" {{ $doctor->specialization == 'تخسيس وتغذية' ? 'selected' : '' }}>تخسيس وتغذية</option>
                    <option value="جراحة اطفال" {{ $doctor->specialization == 'جراحة اطفال' ? 'selected' : '' }}>جراحة اطفال</option>
                    <option value="جراحة أورام" {{ $doctor->specialization == 'جراحة أورام' ? 'selected' : '' }}>جراحة أورام</option>
                    <option value="جراحة اوعية دموية" {{ $doctor->specialization == 'جراحة اوعية دموية' ? 'selected' : '' }}>جراحة اوعية دموية</option>
                    <option value="جراحة تجميل" {{ $doctor->specialization == 'جراحة تجميل' ? 'selected' : '' }}>جراحة تجميل</option>
                    <option value="جراحة سمنة ومناظير" {{ $doctor->specialization == 'جراحة سمنة ومناظير' ? 'selected' : '' }}>جراحة سمنة ومناظير</option>
                    <option value="جراحة عامة" {{ $doctor->specialization == 'جراحة عامة' ? 'selected' : '' }}>جراحة عامة</option>
                    <option value="جراحة عمود فقري" {{ $doctor->specialization == 'جراحة عمود فقري' ? 'selected' : '' }}>جراحة عمود فقري</option>
                    <option value="جراحة قلب وصدر" {{ $doctor->specialization == 'جراحة قلب وصدر' ? 'selected' : '' }}>جراحة قلب وصدر</option>
                    <option value="جراحة مخ واعصاب" {{ $doctor->specialization == 'جراحة مخ واعصاب' ? 'selected' : '' }}>جراحة مخ واعصاب</option>
                    <option value="جهاز هضمي ومناظير" {{ $doctor->specialization == 'جهاز هضمي ومناظير' ? 'selected' : '' }}>جهاز هضمي ومناظير</option>
                    <option value="حساسية ومناعة" {{ $doctor->specialization == 'حساسية ومناعة' ? 'selected' : '' }}>حساسية ومناعة</option>
                    <option value="حقن مجهري واطفال انابيب" {{ $doctor->specialization == 'حقن مجهري واطفال انابيب' ? 'selected' : '' }}>حقن مجهري واطفال انابيب</option>
                    <option value="ذكورة وعقم" {{ $doctor->specialization == 'ذكورة وعقم' ? 'selected' : '' }}>ذكورة وعقم</option>
                    <option value="روماتيزم" {{ $doctor->specialization == 'روماتيزم' ? 'selected' : '' }}>روماتيزم</option>
                    <option value="سكر وغدد صماء" {{ $doctor->specialization == 'سكر وغدد صماء' ? 'selected' : '' }}>سكر وغدد صماء</option>
                    <option value="سمعيات" {{ $doctor->specialization == 'سمعيات' ? 'selected' : '' }}>سمعيات</option>
                    <option value="صدر وجهاز تنفسي" {{ $doctor->specialization == 'صدر وجهاز تنفسي' ? 'selected' : '' }}>صدر وجهاز تنفسي</option>
                    <option value="طب الأسرة" {{ $doctor->specialization == 'طب الأسرة' ? 'selected' : '' }}>طب الأسرة</option>
                    <option value="طب المسنين" {{ $doctor->specialization == 'طب المسنين' ? 'selected' : '' }}>طب المسنين</option>
                    <option value="طب تقويمي" {{ $doctor->specialization == 'طب تقويمي' ? 'selected' : '' }}>طب تقويمي</option>
                    <option value="علاج الآلام" {{ $doctor->specialization == 'علاج الآلام' ? 'selected' : '' }}>علاج الآلام</option>
                    <option value="علاج طبيعي واصابات ملاعب" {{ $doctor->specialization == 'علاج طبيعي واصابات ملاعب' ? 'selected' : '' }}>علاج طبيعي واصابات ملاعب</option>
                    <option value="عيون" {{ $doctor->specialization == 'عيون' ? 'selected' : '' }}>عيون</option>
                    <option value="كبد" {{ $doctor->specialization == 'كبد' ? 'selected' : '' }}>كبد</option>
                    <option value="كلى" {{ $doctor->specialization == 'كلى' ? 'selected' : '' }}>كلى</option>
                    <option value="مراكز أشعة" {{ $doctor->specialization == 'مراكز أشعة' ? 'selected' : '' }}>مراكز أشعة</option>
                    <option value="مسالك بولية" {{ $doctor->specialization == 'مسالك بولية' ? 'selected' : '' }}>مسالك بولية</option>
                    <option value="معامل تحاليل" {{ $doctor->specialization == 'معامل تحاليل' ? 'selected' : '' }}>معامل تحاليل</option>
                    <option value="ممارسة عامة" {{ $doctor->specialization == 'ممارسة عامة' ? 'selected' : '' }}>ممارسة عامة</option>
                    <option value="نطق وتخاطب" {{ $doctor->specialization == 'نطق وتخاطب' ? 'selected' : '' }}>نطق وتخاطب</option>
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">التخصصات الدقيقة</label>
                <div id="subspecializations-wrapper">
                    @foreach($doctor->subspecialization ?? [] as $sub)
                        <input type="text" name="subspecializations[]" class="form-control mb-2" value="{{ $sub }}">
                    @endforeach
                    <input type="text" name="subspecializations[]" class="form-control mb-2" placeholder="اكتب التخصص الدقيق">
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addSubspecialization()">+ إضافة تخصص آخر</button>
            </div>


            <div class="mb-3">
                <label class="form-label">نبذة عن الطبيب</label>
                <textarea name="description" class="form-control">{{ $doctor->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">رقم الهاتف</label>
                <input type="text" name="phone" class="form-control" value="{{ $doctor->phone }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control" value="{{ $doctor->email }}">
            </div>

            <div class="mb-3">
                <label class="form-label">تغيير صورة الطبيب</label>
                <input type="file" name="profile_image" class="form-control">
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary px-4">حفظ التعديلات</button>
            </div>
        </form>
    </div>

    <!-- Clinics Forms -->
    <h4 class="fw-bold mt-4 mb-3 text-success">العيادات المرتبطة بالطبيب</h4>
    @foreach($doctor->clinics as $clinic)
        <div class="card shadow-sm p-4">
            <form action="{{ route('admin.clinics.update', $clinic->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">

                <h5 class="mb-3">عيادة: {{ $clinic->clinic_name }}</h5>

                <div class="mb-3">
                    <label class="form-label">اسم العيادة</label>
                    <input type="text" name="clinic_name" class="form-control" value="{{ $clinic->clinic_name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">المدينة</label>
                    <input type="text" name="city" class="form-control" value="{{ $clinic->city }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">العنوان</label>
                    <textarea name="address" class="form-control" rows="2">{{ $clinic->address }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">سعر الكشف</label>
                    <input type="number" step="0.01" name="consultation_fee" class="form-control" value="{{ $clinic->consultation_fee }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">متوسط وقت الانتظار</label>
                    <input type="text" name="waiting_time" class="form-control" value="{{ $clinic->waiting_time }}">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">حفظ التعديلات</button>
                </div>
            </form>
        </div>
    @endforeach

</div>

</div>

<x-footer />
<script>
function addSubspecialization() {
    const wrapper = document.getElementById('subspecializations-wrapper');
    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'subspecializations[]';
    input.className = 'form-control mb-2';
    input.placeholder = 'اكتب التخصص الدقيق';
    wrapper.appendChild(input);
}
</script>
</body>
</html>
