<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>سجل بياناتك وانضم الان - فيزيتا</title>
  <x-style />
  <style>
    .registration-page {
      background-color: #f0f2f5;
      font-family: 'Cairo', sans-serif;
      padding: 50px 0;
    }

    .registration-page .registration-form-container {
      width: 50%;
      max-width: 600px;
      margin: 0 auto;
      padding: 30px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .registration-page .header-button {
      background-color: #0070cd;
      color: #fff;
      font-weight: 600;
      font-size: 16px;
      padding: 2px 0;
      border-radius: 8px 8px 0 0;
      text-align: center;
      margin: -30px -30px 20px -30px;
    }

    .registration-page .btn-facebook {
      width: 40%;
      background-color: #4267B2;
      color: #fff;
      font-weight: 600;
      padding: 5px 10px;
      font-size: 15px;
      border-radius: 5px;
      display: flex;
      flex-direction: row-reverse;
      align-items: center;
      justify-content: end;
    }
    .registration-page .btn-facebook:hover{
      background-color: #4267B2;
      color: #fff;
    }

    .registration-page .btn-facebook i {
      margin-right: 10px;
      font-size: 15px;
    }

    .registration-page .or-divider {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 20px 0;
      position: relative;
    }

    .registration-page .or-divider::before,
    .registration-page .or-divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background-color: #666;
    }

    .registration-page .or-divider span {
      background-color: #fff;
      border: 1px solid #666;
      border-radius: 50%;
      padding: 2px 10px;
      margin: 0 10px;
      font-size: 14px;
      color: #666;
    }

    .registration-page .form-label.required::after {
      content: ' *';
      color: red;
    }

    .registration-page .btn-vezeeta-primary {
      width: 20%;
      background-color: #ef0f0f;
      color: #fff;
      font-weight: 700;
      padding: 10px;
      font-size: 13px;
      border-radius: 5px;
      border: none;
    }
    .registration-page .btn-vezeeta-primary:hover {
      background-color: #ef0f0f;
      color: #fff;
    }

    .registration-page .text-link {
      color: #007bff;
      font-weight: 600;
      text-decoration: underline;
    }

    .registration-page .form-control {
      width: 40%;
      font-size: 14px;
      padding: 6px 10px;
      background-color: #f7f7f7;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .registration-page .input-group {
      width: 60%;
    }
    .registration-page .form-switch{
      width: 50%;
      margin:auto;
      padding-right:100px;
    }
    .registration-page .form-label {
      width: 40%;
      font-size: 14px;
      font-weight: 500;
      margin-bottom: 0;
      padding-left: 10px;
      white-space: nowrap;
    }

    .registration-page .form-line {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 12px;
    }

    .registration-page .form-line .form-control {
      width: 100%;
      flex: 1;
    }

    @media screen and (max-width: 1160px) {
      .registration-page .registration-form-container {
        width: 90%;
  
      }

      .registration-page .btn-facebook {
        width: 55%;
        justify-content: center;
      }

      .registration-page .btn-vezeeta-primary {
        width: 50%;
      }


      .registration-page .form-line {
        flex-direction: column;
        align-items: flex-start;
      }

      .registration-page .form-line .form-control {
        width: 100%;
      }
      .registration-page .input-group {
        width: 100%;
    }
      .registration-page .form-switch{
        width: 50%;
        margin:auto;
        padding-right:0;
      }
      .registration-page .form-label {
        width: 100%;
        margin-bottom: 5px;
        padding-left: 0;
      }
    }
  </style>
</head>
<body>
  <x-navbar />

  <div class="registration-page">
    <div class="registration-form-container">
      <div class="header-button">انضم الآن</div>

      <div class="d-flex mb-2 justify-content-center">
        <button class="btn btn-facebook">
          <i class="fab fa-facebook-f"></i>
          <span class="ms-2">فعّل حسابك مع فيسبوك</span>
        </button>
      </div>

      <div class="or-divider">
        <span>أو</span>
      </div>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-line">
          <label for="name" class="form-label required">الاسم</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="الاسم بالكامل" required>
        </div>

        <div class="form-line">
          <label for="mobile" class="form-label required">رقم الموبايل</label>
          <div class="input-group">
            <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="رقم الموبايل" required>
            <span class="input-group-text">
              <img src="https://flagcdn.com/w20/eg.png" alt="EG">
              <i class="fas fa-caret-down ms-1"></i>
            </span>
          </div>
        </div>

        <div class="form-line">
          <label for="email" class="form-label required">البريد الإلكتروني</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" required>
        </div>

        <div class="form-line">
          <label class="form-label required">النوع</label>
          <div class="d-flex justify-content-end align-items-center w-60">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="female" value="female">
              <label class="form-check-label" for="female">أنثى</label>
            </div>
            <div class="form-check form-check-inline me-3">
              <input class="form-check-input" type="radio" name="gender" id="male" value="male">
              <label class="form-check-label" for="male">ذكر</label>
            </div>
          </div>
        </div>

        <div class="form-line">
          <label for="dob" class="form-label">تاريخ الميلاد</label>
          <input type="date" class="form-control" id="dob" name="dob">
        </div>

        <div class="form-line">
          <label for="password" class="form-label required">كلمة المرور</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-line">
          <label for="password_confirmation" class="form-label required">تأكيد كلمة المرور</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div class="form-check form-switch d-flex justify-content-between align-items-center mb-3">
          <input class="form-check-input" type="checkbox" id="medicalInsurance" name="medical_insurance" value="1">   
          <label class="form-check-label" for="medicalInsurance">إضافة التأمين الطبي</label>
        </div>

        <p class="text-center text-muted fs-6 mb-3">
          بقيامك بالتسجيل فأنت توافق على
          <a href="#" class="text-link">الشروط و القوانين</a>
        </p>

        <div class="d-flex mb-3 justify-content-center">
          <button type="submit" class="btn btn-vezeeta-primary">اشترك الآن</button>
        </div>
      </form>
      <hr>

      <p class="text-center text-muted">
        مسجل بالفعل في فيزيتا ؟
        <a href="{{route('login')}}" class="text-link">دخول</a>
      </p>
    </div>
  </div>

  <x-script />   
  <x-footer />
</body>
</html>
