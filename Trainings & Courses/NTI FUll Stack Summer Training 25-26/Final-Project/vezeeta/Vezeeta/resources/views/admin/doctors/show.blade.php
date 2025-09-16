<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تفاصيل الطبيب</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background: #f8fafc;
        }
        .page-header {
            background: linear-gradient(135deg, #0d6efd, #3b82f6);
            color: #fff;
            padding: 2rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
        }
        .card {
            border-radius: 1rem;
            border: none;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }
        .doctor-img {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #0d6efd;
            margin-bottom: 1rem;
        }
        .info-label {
            font-weight: 600;
            color: #374151;
        }
        .info-value {
            color: #555;
        }
    </style>
</head>
<body>
    <x-navbar />

    <div class="container py-5">
        <!-- Header -->
        <div class="page-header shadow-sm text-center">
            <h2 class="fw-bold">تفاصيل الطبيب</h2>
            <p class="mb-0">عرض جميع بيانات الطبيب بشكل كامل</p>
        </div>

        <!-- Doctor Card -->
        <div class="card p-4">
            <div class="text-center">
                <!-- صورة الطبيب -->
                <img src="{{ $doctor->profile_image ? asset('storage/'.$doctor->profile_image) : 'https://via.placeholder.com/160' }}" 
                     alt="{{ $doctor->name }}" 
                     class="doctor-img shadow-sm">

                <!-- الاسم -->
                <h3 class="fw-bold text-primary">{{ $doctor->name }}</h3>
                <p class="text-muted">{{ $doctor->title ?? '' }}</p>
            </div>

            <hr>

            <!-- بيانات الطبيب -->
            <div class="row g-3">
                <div class="col-md-6">
                    <p><span class="info-label">التخصص:</span> 
                       <span class="info-value">{{ $doctor->specialization }}</span></p>
                </div>
                <div class="col-md-6">
                    <p><span class="info-label">التخصص الفرعي:</span> 
                       <span class="info-value">{{ $doctor->subspecialization ?? '—' }}</span></p>
                </div>
                <div class="col-md-6">
                    <p><span class="info-label">رقم الهاتف:</span> 
                       <span class="info-value">{{ $doctor->phone }}</span></p>
                </div>
                <div class="col-md-6">
                    <p><span class="info-label">البريد الإلكتروني:</span> 
                       <span class="info-value">{{ $doctor->email ?? '—' }}</span></p>
                </div>
                <div class="col-12">
                    <p><span class="info-label">الوصف:</span></p>
                    <p class="info-value">{{ $doctor->description ?? '—' }}</p>
                </div>
            </div>

            <hr>

            <!-- أزرار التحكم -->
            <div class="d-flex flex-wrap gap-2 justify-content-center mt-3">
                <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary px-4">رجوع</a>
                <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-primary px-4">تعديل</a>
                <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger px-4" 
                        onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الطبيب؟')">
                        حذف
                    </button>
                </form>
            </div>
        </div>
    </div>

    <x-footer />
</body>
</html>
