<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>فيزيتا | احجز أفضل دكتور واطلب أدويتك</title>

  <x-style />
  <!-- أيقونات Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{
      --vz-blue:#0070cd;
      --vz-red:#e60000;
      --vz-border:#e7eaf0;
      --vz-text:#2f3a4a;
      --vz-muted:#98a2b3;
    }

    html,body{height:100%;margin:0}

    /* ===== الخلفية المتغيّرة (Fade) ===== */
    .carousel{position:relative}
    .carousel-item img{height:100vh;object-fit:cover}
    .carousel-fade .carousel-item{transition: opacity 1.5s ease-in-out}
    /* ضباب أبيض نازل من أعلى */
    #heroCarousel::before{
      content:"";position:absolute;inset:0 auto auto 0;width:100%;height:36vh;
      background:linear-gradient(to bottom, rgba(255,255,255,.92), rgba(255,255,255,.55), rgba(255,255,255,0));
      z-index:1;pointer-events:none;
    }

    /* ===== المحتوى الثابت فوق الخلفية ===== */
    .overlay-content{
      height: 100vh;
      position:absolute;
      top:10%;
      left:50%;
      transform:translateX(-50%);
      width:min(1100px,94%);
      z-index:2;
    }

    /* العنوان العلوي يمين */
    .hero-head{text-align:end;color:var(--vz-text)}
    .hero-head h1{font-weight:800;font-size:clamp(22px,3.2vw,34px);margin:0}
    .hero-head .sub{margin-top:.5rem;font-size:clamp(13px,1.6vw,18px)}
    .hero-head a{color:var(--vz-red);font-weight:800;text-decoration:none}

    /* ===== الكرت (Tabs + Search) ===== */
    .hero-card{
      background:#fff;border-radius:22px;overflow:hidden;
      box-shadow:0 14px 30px rgba(0,0,0,.18);
      margin-top:20px
    }

    /* Tabs */
    .hero-tabs{display:flex;border-bottom:1px solid var(--vz-border)}
    .hero-tab{
      position:relative;flex:1;text-align:center;padding:16px 12px;background:#fff;cursor:default
    }
    .hero-tab .title{font-weight:800}
    .hero-tab small{display:block;margin-top:4px;color:var(--vz-muted);font-weight:600}
    .hero-tab i{margin-inline-start:.35rem;font-size:1.05rem}
    .hero-tab.active{color:var(--vz-blue)}
    .hero-tab.active::after{
      content:"";position:absolute;inset:auto 0 0 0;margin:auto;width:120px;height:3px;
      background:var(--vz-blue);border-radius:3px;
    }

    /* Search row */
    .search-wrap{padding:14px 16px}
    .segment{display:flex;flex-direction:column;gap:6px}
    .tiny-label{font-size:.9rem;color:var(--vz-muted);font-weight:700}

    /* مدخلات مسطّحة مع فواصل عمودية */
    .flat-input{height:52px;border:none;box-shadow:none}
    .seg-border{border-inline-start:1px solid var(--vz-border)}
    .with-icon{position:relative}
    .with-icon .fi{
      position:absolute;top:50%;transform:translateY(-50%);
      inset-inline-start:10px;font-size:1rem;color:#0070cd;pointer-events:none
    }
    .with-icon .flat-input{padding-inline-start:34px}
    
    .btn-search{
      height:52px;
      background:red;
      color:#fff;
      font-weight:800;
      border:none;
      border-radius:12px;
    }
    .btn-search i{margin-inline-start:.4rem}

.doctor-card {
    max-width: 150px;
    font-size: 0.85rem;
}

.doctor-card img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    margin-top: 10px;
}

.doctor-card .badge {
    background: #007bff;
    font-size: 0.8rem;
    padding: 2px 6px;
}

.truncate-text {
    display: block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.specialties {
    overflow-x: auto;
    white-space: nowrap;
    padding-bottom: 6px;
    scrollbar-width: thin;
}

.specialties button {
    min-width: fit-content;
}



    .scroll-indicator{
      position:absolute;left:50%;bottom:14px;transform:translateX(-50%);
      z-index:2;opacity:.9;color:#fff
    }
    .scroll-indicator i{font-size:24px;animation:bounce 1.7s infinite}
    @keyframes bounce{
      0%,100%{transform:translate(-50%,0)}
      50%{transform:translate(-50%,6px)}
    }

    @media (max-width:992px){
      .hero-tab small{font-size:.85rem}
      .seg-border{border:none}
    }

    @media (max-width:768px){
      #heroCarousel{display:none;}
      .overlay-content{
        position:relative;
        top:0;
        left:0;
        transform:none;
        height:auto;
        margin:20px auto;
      }
      .scroll-indicator{display:none;}
    }
  </style>
</head>
<body style="background:#eef0f2;">
  <x-navbar />

  <!-- ===== خلفية الكاروسيل (Fade) ===== -->
  <div id="heroCarousel" class="carousel slide carousel-fade"
       data-bs-ride="carousel" data-bs-interval="4000" data-bs-pause="false">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/homecovernewen1-eg.jpg') }}" class="d-block w-100" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/homecovernewen2-eg.jpg') }}" class="d-block w-100" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/homecovernewen3-eg.jpg') }}" class="d-block w-100" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/homecovernewen4-eg.jpg') }}" class="d-block w-100" alt="">
      </div>
    </div>
  </div>

  <!-- ===== Overlay / الفورم ===== -->
  <div class="overlay-content d-flex flex-column justify-content-around">
    <!-- العنوان -->
    <div class="hero-head align-self-start d-flex flex-column">
      <h1>رعاية صحية لحياة أفضل ليك</h1>
        <div class="sub align-self-start">
            احجز أونلاين أو كلم 
            <a href="tel:16676" style="color:#e60000; font-weight:800; text-decoration:none;">
                <i class="bi bi-telephone-fill" style="margin:0 10px;"></i>١٦٦٧٦
            </a>
        </div>
    </div>

    <!-- الكرت -->
    <div class="hero-card mt-3">
      <!-- Tabs -->
      <div class="hero-tabs">
        <div class="hero-tab active">
          <span class="title">احجز دكتور <i class="bi bi-plus-square"></i></span>
          <small>الفحص أو الإجراء</small>
        </div>
        <div class="hero-tab">
          <span class="title">مكالمة دكتور <i class="bi bi-headset"></i></span>
          <small>المتابعة عبر مكالمة مع دكتور</small>
        </div>
      </div>

      <!-- Search -->
      <div class="search-wrap">
        <form class="row g-3 align-items-end">
          <div class="col-lg-2 col-md-6 segment">
            <label class="tiny-label">أنا أبحث عن دكتور</label>
            <div class="with-icon seg-border">
                <i class="bi bi-heart-pulse fi"></i>              
                <select class="form-select flat-input">
                    <option selected>اختر التخصص</option>
                    <option>باطنة</option><option>أسنان</option><option>جلدية</option>
                </select>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 segment">
            <label class="tiny-label">في محافظة</label>
            <div class="with-icon seg-border">
              <i class="bi bi-geo-alt fi"></i>
              <select class="form-select flat-input">
                <option selected>اختر المحافظة</option>
                <option>القاهرة</option><option>الجيزة</option><option>الإسكندرية</option>
              </select>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 segment">
            <label class="tiny-label">في منطقة</label>
            <div class="with-icon seg-border">
              <i class="bi bi-geo fi"></i>
              <select class="form-select flat-input">
                <option selected>اختر المنطقة</option>
                <option>مدينة نصر</option><option>المهندسين</option><option>سيدي جابر</option>
              </select>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 segment">
            <label class="tiny-label">أو اكتب اسم</label>
            <div class="with-icon seg-border">
              <i class="bi bi-hospital fi"></i>
              <input type="text" class="form-control flat-input " placeholder="الدكتور أو المستشفى">
            </div>
          </div>

          <div class="col-lg-2 col-md-12">
            <button type="submit" class="btn btn-search w-100" style="background:red; color:#fff; font-weight:800; border:none; border-radius:12px;">
              ابحث <i class="bi bi-search"></i>
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- سهم تمرير -->
    <div class="scroll-indicator"><i class="bi bi-chevron-double-down"></i></div>
  </div>
  <!-- ===== كرت Shamel ===== -->
<div class="container my-4">
  <div class="d-flex justify-content-between align-items-center p-3 px-4  rounded" style="background: linear-gradient(to left, #0078d7, #0a84d0); color: white;">
    
    <!-- النص -->
    <div class="d-flex flex-column align-items-end">
      <img src="{{ asset('images/shamel-text-logo.jpeg') }}" alt="شامل" style="height: 25px; object-fit: contain;">
      <small class="mt-1">وفر حتى 80% على جميع الخدمات الطبية.</small>
    </div>

    <!-- الزر -->
    <a href="#" class="btn btn-light text-primary  px-4 py-2 rounded" style="width:30%;">انظر التفاصيل</a>
  </div>
</div>


      <!-- ===== قسم الأطباء الأكثر اختياراً ===== -->
    <section class="py-5" style="background:#eef0f2;">
        <div class="container"style="width:80%;background:#fff; padding:20px; border-radius:12px;">

            <!-- العنوان -->
            <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold" style="color:#666;">الأطباء الأكثر اختياراً</h4>
            <a href="#" class="text-primary text-decoration-none">اظهر المزيد</a>
            </div>

            <!-- ===== Tabs التخصصات ===== -->
            <div class="specialties d-flex flex-nowrap gap-2 mb-4">
                <button class="btn btn-sm btn-primary flex-shrink-0 filter-btn" data-specialty="all">كل التخصصات</button>
                @foreach($doctors->pluck('specialization')->unique() as $specialty)
                    <button class="btn btn-sm btn-outline-secondary flex-shrink-0 filter-btn" data-specialty="{{ $specialty }}">
                        {{ $specialty }}
                    </button>
                @endforeach
            </div>

           <!-- ===== Carousel الأطباء ===== -->
<div id="doctorsCarouselWrapper">
  <div id="doctorsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-inner">
      @foreach($doctors->chunk(12) as $chunkIndex => $chunk)
        <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
          <div class="row g-4 justify-content-start">
            @foreach($chunk as $doctor)
  <div class="col-md-3 col-sm-6 doctor-card" style="width: 170px;" data-specialty="{{ $doctor->specialization }}">
    <a href="{{ route('doctors.show', $doctor->id) }}" class="text-decoration-none text-dark">
      <div class="card text-center border rounded-3 shadow-sm p-2 mx-auto h-100">
        <div class="position-relative d-flex justify-content-center">
          <img src="{{ $doctor->profile_image ? asset('storage/' . $doctor->profile_image) : asset('images/default-doctor.png') }}" 
               alt="doctor" 
               class="rounded">

          <span class="badge position-absolute top-0 start-0 mt-2 d-flex align-items-center">
            {{ $doctor->rating ?? '4.5' }}
            <i class="bi bi-star-fill text-warning ms-1"></i>
          </span>
        </div>

        <div class="card-body p-2 text-start">
          <h6 class="mb-1" style="font-size:10px;font-weight:bold;">{{ $doctor->name }}</h6>
          <small class="text-muted d-block mb-1">{{ $doctor->specialization }}</small>
          <small class="text-muted truncate-text">
            <i class="bi bi-geo-alt text-primary"></i> 
            {{ $doctor->clinics->first()->address ?? 'العنوان غير متوفر' }}
          </small>
        </div>
      </div>
    </a>
  </div>
@endforeach

          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

<!-- Grid للأطباء حسب التخصص -->
<div id="doctorsGridWrapper" style="display:none;">
  <div class="row g-4 justify-content-start" id="doctorsGrid"></div>
</div>
        </div>

</section>

<!-- === قسم المراكز الأكثر اختياراً === -->
<div class="container my-4">
  <div class="bg-white p-3 rounded-3 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-3 px-2">
      <h5 class="fw-bold m-0">المراكز الأكثر اختياراً</h5>
      <a href="#" class="text-primary small text-decoration-none">اظهر المزيد</a>
    </div>

    <!-- الكاروسيل -->
    <div id="centersCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-inner">

        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="row">
            <!-- كارت 1 -->
            <div class="col-md-3">
              <div class="card border-0 shadow-sm">
                <img src="{{ asset('images/7574e84e-c147-46a1-9fc4-75539a745dfb-20250908121848.jpg') }}" class="card-img-top rounded" style="height:140px;object-fit:cover;">
                <div class="card-body px-2 py-2">
                  <div class="d-flex align-items-center mb-1">
                    <img src="{{ asset('images/labmedegypt_20250114120859364.jpg') }}" class="rounded-circle me-2" style="width:40px;height:40px;object-fit:cover;">
                    <h6 class="fw-bold mb-0" style="font-size:0.9rem;">ميد لابيت</h6>
                  </div>
                  <small class="text-muted">25 تخصص <i class="bi bi-geo-alt text-primary"></i> التجمع الخامس</small>
                </div>
              </div>
            </div>
            <!-- كارت 2 -->
            <div class="col-md-3">
              <div class="card border-0 shadow-sm">
                <img src="{{ asset('images/32b08a81-f850-40cf-a711-3340e6ebb401-20250722103754.jpg') }}" class="card-img-top rounded" style="height:140px;object-fit:cover;">
                <div class="card-body px-2 py-2">
                  <div class="d-flex align-items-center mb-1">
                    <img src="{{ asset('images/techno_20200312155215458.jpg') }}" class="rounded-circle me-2" style="width:40px;height:40px;object-fit:cover;">
                    <h6 class="fw-bold mb-0" style="font-size:0.9rem;">تكنو</h6>
                  </div>
                  <small class="text-muted">16 تخصص <i class="bi bi-geo-alt text-primary"></i> المهندسين</small>
                </div>
              </div>
            </div>
            <!-- كارت 3 -->
            <div class="col-md-3">
              <div class="card border-0 shadow-sm">
                <img src="{{ asset('images/fallback.jpeg') }}" class="card-img-top rounded" style="height:140px;object-fit:cover;">
                <div class="card-body px-2 py-2">
                  <div class="d-flex align-items-center mb-1">
                    <img src="{{ asset('images/golden-care_20250507122657455.jpg') }}" class="rounded-circle me-2" style="width:40px;height:40px;object-fit:cover;">
                    <h6 class="fw-bold mb-0" style="font-size:0.9rem;">جولدن كير</h6>
                  </div>
                  <small class="text-muted">12 تخصص <i class="bi bi-geo-alt text-primary"></i> الشروق</small>
                </div>
              </div>
            </div>
            <!-- كارت 4 -->
            <div class="col-md-3">
              <div class="card border-0 shadow-sm">
                <img src="{{ asset('images/1e44408c-9935-4bc5-b70c-530f5f98ba01-20250527112039.jpeg') }}" class="card-img-top rounded" style="height:140px;object-fit:cover;">
                <div class="card-body px-2 py-2">
                  <div class="d-flex align-items-center mb-1">
                    <img src="{{ asset('images/fairy-specialized_20241209180137537.jpg') }}" class="rounded-circle me-2" style="width:40px;height:40px;object-fit:cover;">
                    <h6 class="fw-bold mb-0" style="font-size:0.9rem;">فيري التخصصية</h6>
                  </div>
                  <small class="text-muted">10 تخصص <i class="bi bi-geo-alt text-primary"></i> الشيخ زايد</small>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
          <div class="row">
            <!-- كارت 5 -->
            <div class="col-md-3">
              <div class="card border-0 shadow-sm">
                <img src="{{ asset('images/36056455-0d18-4b8f-8caa-dc99c8ed6402-20250316130925.jpg') }}" class="card-img-top rounded" style="height:140px;object-fit:cover;">
                <div class="card-body px-2 py-2">
                  <div class="d-flex align-items-center mb-1">
                    <img src="{{ asset('images/misr-modern-clinics_20240706002518705.jpg') }}" class="rounded-circle me-2" style="width:40px;height:40px;object-fit:cover;">
                    <h6 class="fw-bold mb-0" style="font-size:0.9rem;">مصر الحديثة </h6>
                  </div>
                  <small class="text-muted">8 تخصص <i class="bi bi-geo-alt text-primary"></i> المعادي</small>
                </div>
              </div>
            </div>
            <!-- كارت 6 -->
            <div class="col-md-3">
              <div class="card border-0 shadow-sm">
                <img src="{{ asset('images/c8c39195-cc9d-4e94-a31b-21d67d37b667-20250716120906.jpg') }}" class="card-img-top rounded" style="height:140px;object-fit:cover;">
                <div class="card-body px-2 py-2">
                  <div class="d-flex align-items-center mb-1">
                    <img src="{{ asset('images/hoy_20250716144437900.jpg') }}" class="rounded-circle me-2" style="width:40px;height:40px;object-fit:cover;">
                    <h6 class="fw-bold mb-0" style="font-size:0.9rem;">هوى</h6>
                  </div>
                  <small class="text-muted">14 تخصص <i class="bi bi-geo-alt text-primary"></i> مدينة نصر</small>
                </div>
              </div>
            </div>
            <!-- كارت 7 -->
            <div class="col-md-3">
              <div class="card border-0 shadow-sm">
                <img src="{{ asset('images/106fdcde-1ce2-460b-bf72-04fa30b05d62-20250811123611.jpeg') }}" class="card-img-top rounded" style="height:140px;object-fit:cover;">
                <div class="card-body px-2 py-2">
                  <div class="d-flex align-items-center mb-1">
                    <img src="{{ asset('images/nouvel-age-clinics_20250812165530644.jpg') }}" class="rounded-circle me-2" style="width:40px;height:40px;object-fit:cover;">
                    <h6 class="fw-bold mb-0" style="font-size:0.9rem;">نوفيلاج</h6>
                  </div>
                  <small class="text-muted">20 تخصص <i class="bi bi-geo-alt text-primary"></i> الهرم</small>
                </div>
              </div>
            </div>
            <!-- كارت 8 -->
            <div class="col-md-3">
              <div class="card border-0 shadow-sm">
                <img src="{{ asset('images/168d7ff7-1642-47d9-9abc-5f4310afe44c-20250810163939.jpeg') }}" class="card-img-top rounded" style="height:140px;object-fit:cover;">
                <div class="card-body px-2 py-2">
                  <div class="d-flex align-items-center mb-1">
                    <img src="{{ asset('images/doctor-care_20241203002859436.jpg') }}" class="rounded-circle me-2" style="width:40px;height:40px;object-fit:cover;">
                    <h6 class="fw-bold mb-0" style="font-size:0.9rem;">دكتور كير</h6>
                  </div>
                  <small class="text-muted">18 تخصص <i class="bi bi-geo-alt text-primary"></i> حلوان</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        

      </div>

      <!-- Indicators -->
      <div class="carousel-indicators position-static mt-2">
        <button type="button" data-bs-target="#centersCarousel" data-bs-slide-to="0" class="active bg-primary rounded-circle" style="width:12px;height:12px;"></button>
        <button type="button" data-bs-target="#centersCarousel" data-bs-slide-to="1" class="bg-secondary rounded-circle" style="width:12px;height:12px;"></button>
      </div>
    </div>

  </div>
</div>


<!-- === قسم اكتشف نورث (بعد التنسيق) === -->
<div class="container mb-3">
  <div class="bg-white rounded-3 shadow-sm d-flex justify-content-between align-items-center p-4 flex-wrap gap-3">

    <!-- النص + الصورة في صف واحد -->
    <div class="d-flex align-items-center flex-fill justify-content-start gap-3" style="min-width: 250px;">
      <!-- صورة البنت -->
      <div style="width: 70px; height: 70px; border-radius: 50%; overflow: hidden;">
        <img src="{{ asset('images/mental-health-image.jpeg') }}" alt="نورث صورة" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
      </div>

      <!-- النص -->
      <div class="text-start">
        <img src="{{ asset('images/mental-health-logo.svg') }}" alt="نورث" style="max-height: 30px;"><br>
        <small class="text-muted">عيشها براحة مع نورث.</small>
      </div>
    </div>

    <!-- الزر -->
    <div class="flex-fill text-center" style="min-width: 200px;">
      <a href="#" class="btn btn-light text-primary  w-50 py-2" style="background: #eaf2ff;">اكتشف نورث</a>
    </div>

  </div>
</div>

<!-- === قسم سؤال طبي === -->
<div class="container mb-5">
  <div class="bg-white rounded-3 shadow-sm text-start p-4">
    <h5 class="fw-bold mb-2">لديك سؤال طبي؟</h5>
    <p class="text-muted">ارسل سؤالك الطبي واحصل على إجابة من دكتور متخصص</p>
    <a href="#" class="btn btn-light fw-bold text-primary px-4 py-2" style="background: #eaf2ff;">اسأل الآن</a>
  </div>
</div>

<!-- === قسم الصيدلية === -->
<div class="container my-4">
  <div class="p-4 rounded-3 shadow-sm text-white d-flex align-items-center"
       style="background: url('{{ asset('images/epharmacy-solution-banner-rtl.jpeg') }}') no-repeat left center/cover; min-height:200px;">
       
    <div class="me-auto">
      <h5 class="fw-bold">صيدلية</h5>
      <p class="mb-3">اطلب أدويتك و كل اللي تحتاجه من الصيدلية.</p>
      <a href="#" class="btn btn-light text-primary fw-bold px-5">اطلب الآن</a>
    </div>

  </div>
</div>
<!-- === قسم الخدمات (زيارة منزلية + مكالمة دكتور) === -->
<div class="container my-4">
  <div class="row g-3">
  <!-- مكالمة دكتور -->
      <div class="col-md-6">
        <div class="d-flex justify-content-evenly align-items-center p-3 bg-white rounded-3 shadow-sm h-100">
          <img src="{{ asset('images/desktop.jpeg') }}" class="rounded" style="width:120px; height:90px; object-fit:cover;">
          <div>
            <h6 class="fw-bold fs-5">مكالمة دكتور</h6>
            <p class="text-muted small mb-2">للمتابعة عبر مكالمة صوتية أو فيديو</p>
            <a href="#" class="text-primary fw-bold small text-decoration-none">احجز الآن <i class="bi bi-chevron-left small text-danger"></i></a>
          </div>
        </div>
      </div>
    <!-- زيارة منزلية -->
    <div class="col-md-6">
      <div class="d-flex justify-content-evenly align-items-center p-3 bg-white rounded-3 shadow-sm h-100">
        <img src="{{ asset('images/desktop (1).jpeg') }}" class="rounded" style="width:150px; height:150px; object-fit:cover;">
        <div> 

          <h6 class="fw-bold fs-5">زيارة منزلية</h6>
          <p class="text-muted small mb-2">اختار التخصص، والدكتور هيجيلك البيت.</p>
          <a href="#" class="text-primary fw-bold small text-decoration-none">احجز زيارة <i class="bi bi-chevron-left   text-danger" style="font-weight:900;"></i></a>
        </div>
      </div>
    </div>

    

  </div>
</div>


<!-- قسم اختر من أحسن العروض -->
<div class="container  my-4 py-5" style="background:#fff;">
  <div class="d-flex justify-content-between align-items-center mb-3 px-4">
    <h5 class="fw-bold text-muted">اختر من أحسن العروض</h5>
    <a href="#" class="text-primary small fw-bold text-decoration-none">
      كل العروض <i class="bi bi-chevron-left text-danger"></i>
    </a>
  </div>

  <div id="offersCarousel" class="carousel slide" data-bs-ride="false">
    <div class="carousel-inner">

      <!-- السلايد الأول -->
      <div class="carousel-item active">
        <div class="row g-3 justify-content-center px-4">
          <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100">
              <div class="position-relative">
                <img src="{{ asset('images/desktop (14).jpeg') }}" class="card-img-top rounded" style="height:200px; object-fit:cover;" alt="">
                <span class="badge bg-danger position-absolute top-0 start-0 m-2">خصم 20%</span>
              </div>
              <div class="card-body text-center">
                <h6 class="fw-bold mb-1">تشقير الوجه</h6>
                <p class="mb-0 text-primary fw-bold">
                  1600 جنيه <span class="text-muted text-decoration-line-through">2000</span>
                </p>
                <small class="text-muted">4 عرض</small>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100">
              <div class="position-relative">
                <img src="{{ asset('images/desktop (4).jpeg') }}" class="card-img-top rounded" style="height:200px; object-fit:cover;" alt="">
                <span class="badge bg-danger position-absolute top-0 start-0 m-2">خصم 20%</span>
              </div>
              <div class="card-body text-center">
                <h6 class="fw-bold mb-1">تركيب التقويم المعدني</h6>
                <p class="mb-0 text-primary fw-bold">
                  8000 جنيه <span class="text-muted text-decoration-line-through">10000</span>
                </p>
                <small class="text-muted">3 عرض</small>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100">
              <div class="position-relative">
                <img src="{{ asset('images/desktop (3).jpeg') }}" class="card-img-top rounded" style="height:200px; object-fit:cover;" alt="">
                <span class="badge bg-danger position-absolute top-0 start-0 m-2">خصم 20%</span>
              </div>
              <div class="card-body text-center">
                <h6 class="fw-bold mb-1">تنظيف البشرة</h6>
                <p class="mb-0 text-primary fw-bold">
                  1600 جنيه <span class="text-muted text-decoration-line-through">2000</span>
                </p>
                <small class="text-muted">39 عرض</small>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100">
              <div class="position-relative">
                <img src="{{ asset('images/desktop (2).jpeg') }}" class="card-img-top rounded" style="height:200px; object-fit:cover;" alt="">
                <span class="badge bg-danger position-absolute top-0 start-0 m-2">خصم 40%</span>
              </div>
              <div class="card-body text-center">
                <h6 class="fw-bold mb-1">تنظيف الأسنان</h6>
                <p class="mb-0 text-primary fw-bold">
                  900 جنيه <span class="text-muted text-decoration-line-through">1500</span>
                </p>
                <small class="text-muted">94 عرض</small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- سلايد إضافي -->
      <div class="carousel-item">
        <div class="row g-3 justify-content-start px-4">
          <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100">
              <div class="position-relative">
                <img src="{{ asset('images/desktop (5).jpeg') }}" class="card-img-top rounded" style="height:200px; object-fit:cover;" alt="">
                <span class="badge bg-danger position-absolute top-0 start-0 m-2">خصم 57%</span>
              </div>
              <div class="card-body text-center">
                <h6 class="fw-bold mb-1"> ازالة شعر باليزر</h6>
                <p class="mb-0 text-primary fw-bold">
                  150 جنيه <span class="text-muted text-decoration-line-through">350</span>
                </p>
                <small class="text-muted">31 عرض</small>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100">
              <div class="position-relative">
                <img src="{{ asset('images/desktop (6).jpeg') }}" class="card-img-top rounded" style="height:200px; object-fit:cover;" alt="">
                <span class="badge bg-danger position-absolute top-0 start-0 m-2">خصم 50%</span>
              </div>
              <div class="card-body text-center">
                <h6 class="fw-bold mb-1"> انقاص الوزن</h6>
                <p class="mb-0 text-primary fw-bold">
                  500 جنيه <span class="text-muted text-decoration-line-through">1000</span>
                </p>
                <small class="text-muted">37 عرض</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- أسهم التحكم -->
    <button class="carousel-control-prev" type="button" data-bs-target="#offersCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#offersCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
    </button>
  </div>
</div>


<!-- قسم احجز كشف حسب التخصص -->
<div class="container my-4">
  <div class="d-flex justify-content-between align-items-center mb-3 px-4">
    <h5 class="fw-bold text-muted">احجز كشف حسب التخصص</h5>
  </div>

  <div id="specialtyCarousel" class="carousel slide" data-bs-ride="false">
    <div class="carousel-inner">

      <!-- السلايد الأول -->
      <div class="carousel-item active">
        <div class="row g-3 justify-content-center px-4">
          
          <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100 text-center">
              <img src="{{ asset('images/desktop (10).jpeg') }}" class="card-img-top rounded" style="height:200px; object-fit:cover;" alt="">
              <div class="card-body">
                <h6 class="fw-bold">اطفال وحديثي الولادة</h6>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100 text-center">
              <img src="{{ asset('images/desktop (9).jpeg') }}" class="card-img-top rounded" style="height:200px; object-fit:cover;" alt="">
              <div class="card-body">
                <h6 class="fw-bold">نفسي</h6>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100 text-center">
              <img src="{{ asset('images/desktop (8).jpeg') }}" class="card-img-top rounded" style="height:200px; object-fit:cover;" alt="">
              <div class="card-body">
                <h6 class="fw-bold">اسنان</h6>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100 text-center">
              <img src="{{ asset('images/desktop (7).jpeg') }}" class="card-img-top rounded" style="height:200px; object-fit:cover;" alt="">
              <div class="card-body">
                <h6 class="fw-bold">جلدية</h6>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- السلايد الثاني -->
      <div class="carousel-item">
        <div class="row g-3 justify-content-center px-4">
          <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100 text-center">
              <img src="{{ asset('images/desktop (11).jpeg') }}" class="card-img-top rounded" style="height:200px; object-fit:cover;" alt="">
              <div class="card-body">
                <h6 class="fw-bold">مخ و اعصاب</h6>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100 text-center">
              <img src="{{ asset('images/desktop (12).jpeg') }}" class="card-img-top rounded" style="height:200px; object-fit:cover;" alt="">
              <div class="card-body">
                <h6 class="fw-bold">عظام</h6>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100 text-center">
              <img src="{{ asset('images/desktop (13).jpeg') }}" class="card-img-top rounded" style="height:200px; object-fit:cover;" alt="">
              <div class="card-body">
                <h6 class="fw-bold">  نساء وتوليد</h6>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100 text-center">
              <img src="{{ asset('images/desktop (15).jpeg') }}" class="card-img-top rounded" style="height:200px; object-fit:cover;" alt="">
              <div class="card-body">
                <h6 class="fw-bold">  انف واذن وحنجرة</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- أسهم التحكم -->
    <button class="carousel-control-prev" type="button" data-bs-target="#specialtyCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#specialtyCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
    </button>
  </div>
</div>

<!-- قسم المميزات + تحميل التطبيق -->
<div class="container-fluid my-5 py-5" style="background-color: #fff;">

  <!-- المميزات -->
  <div class="row text-start mb-5 d-flex justify-content-center gap-4 px-4">
    <div class="col-md-2">
      <img src="{{asset('images/medical-care-icon.svg')}}" alt="icon" class="mb-3" width="40">
      <h6 class="fw-bold text-muted">كل احتياجاتك على فيزيتا</h6>
      <p class="text-muted small">
        ابحث و احجز كشف مع دكتور في عيادة، مستشفى، زيارة منزلية، أو عبر مكالمة.
        ممكن كمان تطلب أدوية، أو تحجز خدمة أو عملية بأحسن سعر.
      </p>
    </div>
    <div class="col-md-2">
      <img src="{{asset('images/doctor-icon.svg')}}" alt="icon" class="mb-3" width="40">
      <h6 class="fw-bold text-muted">تقييمات حقيقية من المرضى</h6>
      <p class="text-muted small">
        تقييمات للدكاترة من مرضى حجزوا على فيزيتا و زاروا الدكتور بالفعل.
      </p>
    </div>
    <div class="col-md-2">
      <img src="{{asset('images/booking-icon.svg')}}" alt="icon" class="mb-3" width="40">
      <h6 class="fw-bold text-muted">حجزك مؤكد مع الدكتور</h6>
      <p class="text-muted small">
        حجزك مؤكد بمجرد اختيارك من المواعيد المتاحة للدكتور.
      </p>
    </div>
    <div class="col-md-2">
      <img src="{{asset('images/security-icon.svg')}}" alt="icon" class="mb-3" width="40">
      <h6 class="fw-bold text-muted">احجز مجاناً و ادفع في العيادة</h6>
      <p class="text-muted small">
        سعر الكشف على فيزيتا نفس سعر الكشف في العيادة، بدون أي مصاريف إضافية.
      </p>
    </div>
  </div>

  <!-- تحميل التطبيق -->
<div class="p-4 rounded-3 container" style="background-color:#0070cd; color:white;">
  <div class="row align-items-center">
    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
      <h4 class="fw-bold mb-3 fs-2">حمّل تطبيق فيزيتا</h4>
      <p class="mb-4">
        ابحث، قارن واحجز استشارات طبية بسهولة مع أكبر شبكة دكاترة في مصر. اطلب أدويتك
        وهتوصلك خلال 60 دقيقة، تابع خطواتك اليومية واكسب النقاط عند تحقيق الهدف اليومي.
      </p>

      <!-- أزرار التحميل -->
      <div class="d-flex justify-content-center justify-content-md-start gap-2 flex-wrap">
      <!-- App Store -->
          <a href="https://apps.apple.com/eg/app/vezeeta-book-a-doctor/id946915602" target="_blank" 
            class="d-flex align-items-center border rounded px-3 py-2 bg-white text-dark text-decoration-none" 
            style="min-width:140px;">
            <img src="{{asset('images/apple-logo.svg')}}" alt="App Store" width="24" class="me-2">
            <span class="small fw-bold">App Store</span>
          </a>
        <!-- Google Play -->
        <a href="https://play.google.com/store/apps/details?id=com.vezeeta.vezeetapatients" target="_blank" 
           class="d-flex align-items-center border rounded px-3 py-2 bg-white text-dark text-decoration-none" 
           style="min-width:140px;">
          <img src="{{asset('images/google-play-logo.svg')}}" alt="Google Play" width="24" class="me-2">
          <span class="small fw-bold">Google Play</span>
        </a>

        
        <!-- AppGallery -->
        <a href="https://appgallery.huawei.com/app/C101356111" target="_blank" 
           class="d-flex align-items-center border rounded px-3 py-2 bg-white text-dark text-decoration-none" 
           style="min-width:140px;">
          <img src="{{asset('images/AppGallery.svg')}}" alt="App Gallery" width="24" class="me-2">
          <span class="small fw-bold">App Gallery</span>
        </a>

      </div>
    </div>

    <div class="col-md-6 text-center">
      <img src="{{ asset('images/dowanloadApp-eg-ar.jpeg') }}" alt="تطبيق فيزيتا" class="img-fluid" style="max-height: 300px;">
    </div>
  </div>
</div>

    </div>
  </div>
</div>

  <x-footer />
  <x-script />
 <script>
document.querySelectorAll('.filter-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    let specialty = this.getAttribute('data-specialty');
    
    // تغيير شكل الأزرار
    document.querySelectorAll('.filter-btn').forEach(b => {
      b.classList.remove('btn-primary');
      b.classList.add('btn-outline-secondary');
    });
    this.classList.remove('btn-outline-secondary');
    this.classList.add('btn-primary');

    let carouselWrapper = document.getElementById('doctorsCarouselWrapper');
    let gridWrapper = document.getElementById('doctorsGridWrapper');
    let grid = document.getElementById('doctorsGrid');
    let carouselElement = document.getElementById('doctorsCarousel');
    let carousel = bootstrap.Carousel.getInstance(carouselElement);

    if (specialty === 'all') {
      // إظهار الكاروسيل
      gridWrapper.style.display = 'none';
      carouselWrapper.style.display = 'block';
      if (!carousel) {
        carousel = new bootstrap.Carousel(carouselElement, {
          interval: 4000,
          ride: 'carousel'
        });
      } else {
        carousel.cycle();
      }
    } else {
      // إخفاء الكاروسيل وإظهار Grid
      if (carousel) carousel.pause();
      carouselWrapper.style.display = 'none';
      gridWrapper.style.display = 'block';

      // فلترة الأطباء وعرضهم في Grid
      grid.innerHTML = '';
      document.querySelectorAll('#doctorsCarousel .doctor-card').forEach(card => {
        if (card.dataset.specialty === specialty) {
          grid.appendChild(card.cloneNode(true));
        }
      });
    }
  });
});
</script>


</body>
</html>
