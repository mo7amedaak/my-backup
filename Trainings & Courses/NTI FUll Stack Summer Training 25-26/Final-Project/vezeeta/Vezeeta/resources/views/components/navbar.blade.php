<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vezeeta Navbar</title>
  <x-style />
  <style>
    body {
      font-family: 'Cairo', sans-serif;
      background-color: #f8f9fa;
    }

    .navbar {
      background-color: #0070cd;
    }

    .navbar .nav-link {
      color: #fff !important;
      font-weight: 600;
    }

    .navbar .nav-link:hover {
      text-decoration: underline;
    }

    .btn-join {
      background: #0070cd;
      color: #fff !important;
      font-weight: 600;
      border: 1px solid #fff;
      padding: 2px 5px;
      margin-left: 10px;
      text-decoration: none;
      transition: 0.3s;
    }

    .btn-join:hover {
      background: #fff;
      color: #0070cd !important;
    }
    .navbar-nav .nav-item {
      display: inline-flex;
      align-items: center;
      font-size: 13px;
    }

    .navbar-nav .nav-item:not(:first-child):not(.no-separator)::before {
      content: "|";
      color: #ddd;
      margin: 0 2px;
      font-weight: 300;
    }

    .dropdown-menu img {
      margin-left: 5px;
    }

    .navbar-toggler {
      border: none;
    }

    /* Sidebar Styling */
    .sidebar {
      position: fixed;
      top: 0;
      right: -300px;
      width: 300px;
      height: 100%;
      background-color: #0070cd;
      z-index: 1050;
      transition: right 0.3s ease-in-out;
      overflow-y: auto;
    }

    .sidebar.open {
      right: 0;
    }

    .sidebar .sidebar-content a {
      font-weight: 600;
      font-size: 16px;
      text-decoration: none;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 10px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.3);
      font-size: 15px;
      font-weight: 500;
    }

    .sidebar .sidebar-content a:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .sidebar .sidebar-content a i {
      font-size: 1.2rem;
      margin-left: 8px;
    }

    .sidebar-header {
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
      text-align: left;
      padding: 1rem;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm sticky-top">
  <div class="container d-flex justify-content-between flex-row-reverse">

    <!-- شعار فيزيتا -->
    <a class="navbar-brand" href="#">
      <img src="https://cdn-react.vezeeta.com/vezeeta-web-reactjs/jenkins-31/images/whitelogowithdotcom.png" alt="Vezeeta" width="170" />
    </a>

    <!-- زر القائمة الجانبية -->
    <button id="sidebarToggle" class="navbar-toggler text-white" type="button" aria-label="Toggle sidebar">
      <i class="bi bi-list" id="toggleIcon" style="font-size: 1.5rem;"></i>
    </button>

    <!-- القائمة -->
    <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
      <ul class="navbar-nav align-items-center">
        <!-- الدولة -->
        <li class="nav-item dropdown d-flex align-items-center">
          <a class="nav-link dropdown-toggle d-flex align-items-center text-light" href="#" id="countryDropdownNavbar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img id="navbarFlag" src="https://flagcdn.com/w20/eg.png" class="me-2" alt="Egypt" />
            <span id="navbarCountry">مصر</span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="countryDropdownNavbar">
            <li><a class="dropdown-item country-option" href="#" data-country="السعودية" data-flag="https://flagcdn.com/w20/sa.png">السعودية <img src="https://flagcdn.com/w20/sa.png" class="me-2" /></a></li>
            <li><a class="dropdown-item country-option" href="#" data-country="مصر" data-flag="https://flagcdn.com/w20/eg.png">مصر <img src="https://flagcdn.com/w20/eg.png" class="me-2" /></a></li>
            <li><a class="dropdown-item country-option" href="#" data-country="الأردن" data-flag="https://flagcdn.com/w20/jo.png">الأردن <img src="https://flagcdn.com/w20/jo.png" class="me-2" /></a></li>
            <li><a class="dropdown-item country-option" href="#" data-country="لبنان" data-flag="https://flagcdn.com/w20/lb.png">لبنان <img src="https://flagcdn.com/w20/lb.png" class="me-2" /></a></li>
            <li><a class="dropdown-item country-option" href="#" data-country="نيجيريا" data-flag="https://flagcdn.com/w20/ng.png">نيجيريا <img src="https://flagcdn.com/w20/ng.png" class="me-2" /></a></li>
            <li><a class="dropdown-item country-option" href="#" data-country="كينيا" data-flag="https://flagcdn.com/w20/ke.png">كينيا <img src="https://flagcdn.com/w20/ke.png" class="me-2" /></a></li>
          </ul>
        </li>

        <li class="nav-item fs-6"><a class="nav-link" href="#">English</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">اتصل بنا</a></li>
        <li class="nav-item"><a class="nav-link" href="#">فيزيتا للأطباء</a></li>
        
      @auth
      <li class="nav-item dropdown d-flex align-items-center">
        <a class="nav-link dropdown-toggle text-light" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu  text-start" aria-labelledby="userDropdown">
          <li>
            <a class="dropdown-item" style="color:#0070cd;" href="#"><i class="bi bi-person"></i> بياناتي</a>
          </li>
          <li>
            <a class="dropdown-item" style="color:#0070cd;" href="#"><i class="bi bi-calendar"></i> مواعيدي</a>
          </li>
          <li>
            <a class="dropdown-item" style="color:#0070cd;" href="#"><i class="bi bi-shield-check"></i> تأميني الطبي</a>
          </li>
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit"  class="dropdown-item text-danger"><i class="bi bi-box-arrow-right"></i> خروج</button>
            </form>
          </li>
  </ul>
</li>
@else
<li class="nav-item"><a class="nav-link" href="{{route('login')}}">دخول</a></li>
<li class="nav-item no-separator">
  <a class="btn-join" href="{{route('register')}}">انضم الآن</a>
</li>
@endauth

      </ul>
    </div>
  </div>
</nav>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
  <div class="sidebar-header d-flex justify-content-between align-items-center">
    <button id="closeSidebar" class="btn text-white fs-4"><i class="bi bi-arrow-right"></i></button>
  </div>

  <div class="sidebar-content p-3">

    <a href="#" class="d-block mb-3 text-white"><i class="bi bi-house-door"></i> الصفحة الرئيسية</a>
    <a href="#" class="d-block mb-3 text-white"><i class="bi bi-people"></i> فيزيتا للأطباء</a>
    <a href="#" class="d-block mb-3 text-white"><i class="bi bi-telephone"></i> اتصل بنا</a>

    @auth
      <!-- دروب داون اسم اليوزر -->
      <div class="dropdown mb-3">
        <a class="dropdown-toggle text-white d-block text-decoration-none" href="#" id="sidebarUserDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu text-start" aria-labelledby="sidebarUserDropdown">
          <li><a class="dropdown-item" style="color:#0070cd;" href="#"><i class="bi bi-person"></i> بياناتي</a></li>
          <li><a class="dropdown-item" style="color:#0070cd;" href="#"><i class="bi bi-calendar"></i> مواعيدي</a></li>
          <li><a class="dropdown-item" style="color:#0070cd;" href="#"><i class="bi bi-shield-check"></i> تأميني الطبي</a></li>
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right"></i> خروج</button>
            </form>
          </li>
        </ul>
      </div>
    @else
      <!-- لو مش مسجل دخول -->
      <a href="{{ route('register') }}" class="d-block mb-3 text-white"><i class="bi bi-person-plus"></i> انضم الآن كمستخدم</a>
      <a href="{{ route('login') }}" class="d-block mb-3 text-white"><i class="bi bi-box-arrow-in-right"></i> دخول</a>
    @endauth

    <!-- اللغة والدولة -->
    <div class="d-flex mt-3 align-items-center text-white justify-content-between">
      <a href="#" class="text-white" style="border:none;">English</a>
      <div class="dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center text-light" href="#" id="countryDropdownSidebar" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="border:none;">
          <img id="sidebarFlag" src="https://flagcdn.com/w20/eg.png" class="me-2" alt="Egypt" />
          <span id="sidebarCountry">مصر</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="countryDropdownSidebar">
          <li><a class="dropdown-item country-option" href="#" data-country="السعودية" data-flag="https://flagcdn.com/w20/sa.png">السعودية <img src="https://flagcdn.com/w20/sa.png" class="me-2" /></a></li>
          <li><a class="dropdown-item country-option" href="#" data-country="مصر" data-flag="https://flagcdn.com/w20/eg.png">مصر <img src="https://flagcdn.com/w20/eg.png" class="me-2" /></a></li>
          <li><a class="dropdown-item country-option" href="#" data-country="الأردن" data-flag="https://flagcdn.com/w20/jo.png">الأردن <img src="https://flagcdn.com/w20/jo.png" class="me-2" /></a></li>
          <li><a class="dropdown-item country-option" href="#" data-country="لبنان" data-flag="https://flagcdn.com/w20/lb.png">لبنان <img src="https://flagcdn.com/w20/lb.png" class="me-2" /></a></li>
          <li><a class="dropdown-item country-option" href="#" data-country="نيجيريا" data-flag="https://flagcdn.com/w20/ng.png">نيجيريا <img src="https://flagcdn.com/w20/ng.png" class="me-2" /></a></li>
          <li><a class="dropdown-item country-option" href="#" data-country="كينيا" data-flag="https://flagcdn.com/w20/ke.png">كينيا <img src="https://flagcdn.com/w20/ke.png" class="me-2" /></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script>
  const sidebar = document.getElementById("sidebar");
  const sidebarToggle = document.getElementById("sidebarToggle");
  const closeSidebarBtn = document.getElementById("closeSidebar");

  sidebarToggle.addEventListener("click", () => {
    sidebar.classList.add("open");
  });

  closeSidebarBtn.addEventListener("click", () => {
    sidebar.classList.remove("open");
  });

  document.addEventListener("click", (e) => {
    if (
      !sidebar.contains(e.target) &&
      !sidebarToggle.contains(e.target)
    ) {
      sidebar.classList.remove("open");
    }
  });

  // تغيير الدولة
  document.querySelectorAll('.country-option').forEach(option => {
    option.addEventListener('click', function (e) {
      e.preventDefault();

      const selectedCountry = this.dataset.country;
      const selectedFlag = this.dataset.flag;

      // تحديث النافبار
      document.getElementById('navbarCountry').textContent = selectedCountry;
      document.getElementById('navbarFlag').src = selectedFlag;

      // تحديث السايدبار
      document.getElementById('sidebarCountry').textContent = selectedCountry;
      document.getElementById('sidebarFlag').src = selectedFlag;
    });
  });
</script>
<x-script />
</body>
</html>
