<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إضافة طبيب جديد</title>
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
    </style>
</head>
<body>
<x-navbar />

<div class="container py-5">
    <!-- Header -->
    <div class="page-header shadow-sm">
        <h2 class="fw-bold">إضافة طبيب جديد</h2>
        <p class="mb-0">املأ البيانات التالية لإضافة طبيب جديد للنظام</p>
    </div>

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">اسم الطبيب</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">المسمى الوظيفي</label>
                <input type="text" name="title" class="form-control">
            </div>

            
            <div class="mb-3">
                <label class="form-label">التخصص</label>
                <select name="specialization" class="form-select" required>
                    <option value="" disabled selected>اختر التخصص</option>
                    <option value="جلدية">جلدية</option>
                    <option value="اسنان">اسنان</option>
                    <option value="نفسي">نفسي</option>
                    <option value="اطفال وحديثي الولادة">اطفال وحديثي الولادة</option>
                    <option value="مخ واعصاب">مخ واعصاب</option>
                    <option value="عظام">عظام</option>
                    <option value="نساء وتوليد">نساء وتوليد</option>
                    <option value="انف واذن وحنجرة">انف واذن وحنجرة</option>
                    <option value="قلب واوعية دموية">قلب واوعية دموية</option>
                    <option value="الآشعة التداخلية">الآشعة التداخلية</option>
                    <option value="امراض دم">امراض دم</option>
                    <option value="اورام">اورام</option>
                    <option value="باطنة">باطنة</option>
                    <option value="تخسيس وتغذية">تخسيس وتغذية</option>
                    <option value="جراحة اطفال">جراحة اطفال</option>
                    <option value="جراحة أورام">جراحة أورام</option>
                    <option value="جراحة اوعية دموية">جراحة اوعية دموية</option>
                    <option value="جراحة تجميل">جراحة تجميل</option>
                    <option value="جراحة سمنة ومناظير">جراحة سمنة ومناظير</option>
                    <option value="جراحة عامة">جراحة عامة</option>
                    <option value="جراحة عمود فقري">جراحة عمود فقري</option>
                    <option value="جراحة قلب وصدر">جراحة قلب وصدر</option>
                    <option value="جراحة مخ واعصاب">جراحة مخ واعصاب</option>
                    <option value="جهاز هضمي ومناظير">جهاز هضمي ومناظير</option>
                    <option value="حساسية ومناعة">حساسية ومناعة</option>
                    <option value="حقن مجهري واطفال انابيب">حقن مجهري واطفال انابيب</option>
                    <option value="ذكورة وعقم">ذكورة وعقم</option>
                    <option value="روماتيزم">روماتيزم</option>
                    <option value="سكر وغدد صماء">سكر وغدد صماء</option>
                    <option value="سمعيات">سمعيات</option>
                    <option value="صدر وجهاز تنفسي">صدر وجهاز تنفسي</option>
                    <option value="طب الأسرة">طب الأسرة</option>
                    <option value="طب المسنين">طب المسنين</option>
                    <option value="طب تقويمي">طب تقويمي</option>
                    <option value="علاج الآلام">علاج الآلام</option>
                    <option value="علاج طبيعي واصابات ملاعب">علاج طبيعي واصابات ملاعب</option>
                    <option value="عيون">عيون</option>
                    <option value="كبد">كبد</option>
                    <option value="كلى">كلى</option>
                    <option value="مراكز أشعة">مراكز أشعة</option>
                    <option value="مسالك بولية">مسالك بولية</option>
                    <option value="معامل تحاليل">معامل تحاليل</option>
                    <option value="ممارسة عامة">ممارسة عامة</option>
                    <option value="نطق وتخاطب">نطق وتخاطب</option>
                </select>
            </div>
            

            <div class="mb-3">
                <label class="form-label">التخصصات الدقيقة</label>
                <div id="subspecializations-wrapper">
                    <input type="text" name="subspecializations[]" class="form-control mb-2" placeholder="اكتب التخصص الدقيق">
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addSubspecialization()">+ إضافة تخصص آخر</button>
            </div>


            <div class="mb-3">
                <label class="form-label">نبذة عن الطبيب</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">رقم الهاتف</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">صورة الطبيب</label>
                <input type="file" name="profile_image" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('dashboard.admin') }}" class="btn btn-secondary">رجوع</a>
                <button type="submit" class="btn btn-primary">حفظ الطبيب</button>
            </div>
        </form>
    </div>
        <!-- Clinic Form -->
    <div class="card shadow-sm p-4 mt-4">
        <h4 class="mb-3 text-success">بيانات العيادة</h4>
        <form action="{{ route('admin.clinics.store') }}" method="POST">
            @csrf

            <!-- اختيار الطبيب -->
            <div class="mb-3">
                <label class="form-label">اختر الطبيب</label>
                <select name="doctor_id" class="form-select" required>
                    <option value="" disabled selected>-- اختر الطبيب --</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->specialization }})</option>
                    @endforeach
                </select>
            </div>

            <!-- اسم العيادة -->
            <div class="mb-3">
                <label class="form-label">اسم العيادة</label>
                <input type="text" name="clinic_name" class="form-control" required>
            </div>

            <!-- المدينة -->
            <div class="mb-3">
                <label class="form-label">المدينة</label>
                <input type="text" name="city" class="form-control" required>
            </div>

            <!-- العنوان -->
            <div class="mb-3">
                <label class="form-label">عنوان العيادة</label>
                <textarea name="address" class="form-control" rows="2" required></textarea>
            </div>

            <!-- سعر الكشف -->
            <div class="mb-3">
                <label class="form-label">سعر الكشف</label>
                <input type="number" step="0.01" name="consultation_fee" class="form-control">
            </div>

            <!-- متوسط وقت الانتظار -->
            <div class="mb-3">
                <label class="form-label">متوسط وقت الانتظار</label>
                <input type="text" name="waiting_time" class="form-control" placeholder="مثال: 30 دقيقة">
            </div>

            <!-- أيام العمل -->
            <div class="mb-3">
                <label class="form-label">أيام العمل</label><br>
                @php
                    $days = ['السبت','الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة'];
                @endphp
                @foreach($days as $day)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="working_hours[]" value="{{ $day }}">
                        <label class="form-check-label">{{ $day }}</label>
                    </div>
                @endforeach
            </div>

            <!-- زر الحفظ -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">حفظ العيادة</button>
            </div>
        </form>
    </div>

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
