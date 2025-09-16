<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>فوتر Vezeeta - Bootstrap</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <x-style />
  <style>
    body {
      font-family: 'Cairo', sans-serif;
    }

    .footer {
      width: 100%;
      background-color: #0072ce;
      color: white;
      padding: 40px 0;
    }

    .footer .container-fluid {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    .footer a {
      color: white;
      font-size: 14px;
      text-decoration: none;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    .footer h5 {
      margin-bottom: 15px;
      font-size: 18px;
      font-weight: 800;
    }

    .logo-vezeeta {
      margin-bottom: 15px;
    }

    .logo-vezeeta img {
      width: 140px;
    }

    .social-icons a {
      font-size: 26px;
      margin-inline: 8px;
      color: white;
    }

    .store-buttons img {
      width: 150px;
      margin-bottom: 12px;
    }

    .footer .col-md-2,
    .footer .col-md-3 {
      padding-right: 20px;
      padding-left: 20px;
    }

    .footer ul li {
      margin-bottom: 8px;
    }

    /*  Responsive for mobile */
    @media (max-width: 1000px) {
      .footer {
        text-align: center;
      }

      .footer .row {
        flex-direction:row-reverse;
        flex-wrap: wrap;
        align-items: center;
        
      }

      .footer .row > div {
        width: 80%;
        max-width: 200px;
        margin-bottom: 25px;
      }

      .store-buttons img {
        width: 130px;
        margin: 10px;
      }

      .social-icons a {
        font-size: 26px;
        margin: 0 10px;
      }
      #footer-apps {
        width: 100%;
        margin: 0 auto;
      }
    }
  </style>
</head>
<body>

<!--  Footer -->
<footer class="footer">
  <div class="container-fluid">
    <div class="row justify-content-between">

      <!-- الشعار واللينكات -->
      <div class="col-md-2 text-md-start text-center">
        <div class="logo-vezeeta mb-3">
          <img src="https://cdn-react.vezeeta.com/vezeeta-web-reactjs/jenkins-31/images/whitelogowithdotcom.png" alt="Vezeeta" />
        </div>
        <ul class="list-unstyled">
          <li><a href="#">من نحن</a></li>
          <li><a href="#">فريق فيزيتا</a></li>
          <li><a href="#">وظائف</a></li>
          <li><a href="#">الصحافة</a></li>
        </ul>
      </div>

      <!-- ابحث عن طريق -->
      <div class="col-md-2 text-md-start text-center">
        <h5>ابحث عن طريق</h5>
        <ul class="list-unstyled">
          <li><a href="#">التخصص</a></li>
          <li><a href="#">المنطقة</a></li>
          <li><a href="#">الألم</a></li>
          <li><a href="#">المستشفى</a></li>
          <li><a href="#">المركز</a></li>
        </ul>
      </div>

      <!-- هل أنت طبيب -->
      <div class="col-md-2 text-md-start text-center">
        <h5>هل أنت طبيب؟</h5>
        <ul class="list-unstyled">
          <li><a href="#">انضم إلى أطباء فيزيتا</a></li>
        </ul>
      </div>

      <!-- تحتاج للمساعدة -->
      <div class="col-md-3 text-md-start text-center">
        <h5>تحتاج للمساعدة؟</h5>
        <ul class="list-unstyled">
          <li><a href="#">مكتبة طبية</a></li>
          <li><a href="#">اتصل بنا</a></li>
          <li><a href="#">شروط الاستخدام</a></li>
          <li><a href="#">اتفاقية الخصوصية</a></li>
          <li><a href="#">اتفاقية الخصوصية للأطباء</a></li>
        </ul>
      </div>

      <!-- التطبيقات والسوشيال -->
      <div class="col-md-3 text-md-end text-center" id="footer-apps">
        <div class="store-buttons mb-3">
          <a href="#"><img src="{{asset('images/google-play-badge.jpeg')}}" alt="Google Play"></a><br>
          <a href="#"><img src="{{asset('images/app-store-badge.jpeg')}}" alt="App Store"></a>
        </div>
        <div class="social-icons mt-3">
          <a href="#"><i class="fab fa-x-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-facebook-f"></i></a>
        </div>
      </div>

    </div>
  </div>
</footer>

<!-- Bootstrap JS -->
<x-script />
</body>
</html>
