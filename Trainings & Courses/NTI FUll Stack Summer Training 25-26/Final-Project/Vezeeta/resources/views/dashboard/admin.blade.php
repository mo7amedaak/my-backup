<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم - إدارة الأطباء</title>
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
            border: none;
            border-radius: 1rem;
            transition: all 0.2s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .doctor-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: .75rem;
        }
    </style>
</head>
<body>
    <x-navbar />

    <div class="container py-5">
        <!-- العنوان -->
        <div class="page-header shadow-sm">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h2 class="fw-bold">إدارة الأطباء</h2>
                    <p class="mb-0">عرض، إضافة، تعديل وحذف بيانات الأطباء</p>
                </div>
                <a href="{{ route('admin.doctors.create') }}" class="btn btn-light fw-bold"> إضافة طبيب او عيادة +</a>
            </div>
        </div>

        <!-- شبكة الأطباء -->
        @if($doctors->count())
            <div class="row g-4">
                @foreach($doctors as $doctor)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm text-center p-3">
                            <!-- صورة الدكتور -->
                            <div class="d-flex justify-content-center mb-3">
                                <div class="rounded-circle overflow-hidden" style="width:120px; height:120px; border:4px solid #0d6efd;">
                                    @if($doctor->profile_image)
                                        <img src="{{ asset('storage/'.$doctor->profile_image) }}" 
                                            alt="{{ $doctor->name }}" 
                                            class="w-100 h-100" 
                                            style="object-fit: cover;">
                                    @else
                                        <img src="https://via.placeholder.com/120" 
                                            alt="Doctor" 
                                            class="w-100 h-100" 
                                            style="object-fit: cover;">
                                    @endif
                                </div>
                            </div>

                            <!-- بيانات الدكتور -->
                            <h5 class="fw-bold text-primary">{{ $doctor->name }}</h5>
                            <p class="mb-1"><strong>التخصص:</strong> {{ $doctor->specialization }}</p>
                            <p class="mb-1"><strong>المسمى الوظيفي:</strong> {{ $doctor->title ?? '—' }}</p>
                            <p class="text-muted small mt-2">{{ Str::limit($doctor->description, 80, '...') }}</p>

                            <!-- الأكشن -->
                            <div class="d-flex flex-wrap gap-2 mt-3">
                                <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-outline-secondary btn-sm flex-grow-1">تعديل</a>
                                <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" class="flex-grow-1">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm w-100" 
                                        onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الطبيب؟')">
                                        حذف
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

            <!-- ترقيم الصفحات -->
            <div class="d-flex justify-content-center mt-5">
                {{ $doctors->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="alert alert-info text-center shadow-sm rounded-3">
                لا يوجد أطباء حاليًا. ابدأ بإضافة طبيب جديد.
            </div>
        @endif
    </div>

    <x-footer />
    <x-script />
</body>
</html>
