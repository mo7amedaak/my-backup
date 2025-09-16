<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل الدخول - فيزيتا</title>
  <x-style />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    * {
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Cairo', sans-serif;
      background-color: #e2e6ea;
    }

    body {
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 30px 10px;
    }

    .login-container {
      width: 100%;
      max-width: 400px;
      background-color: #fff;
      padding: 25px 20px;
      border-radius: 8px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .header-button {
      background-color: #0070cd;
      color: #fff;
      font-weight: 600;
      font-size: 16px;
      padding: 1px 0;
      border-radius: 8px 8px 0 0;
      text-align: center;
      margin: -25px -20px 20px -20px;
    }

    .form-label {
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
      font-size: 14px;
    }

    .form-label.required::after {
      content: ' *';
      color: red;
    }

    .form-control {
      width: 100%;
      font-size: 14px;
      padding: 8px;
      background-color: #f7f7f7;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 12px;
    }

    .btn-vezeeta-primary {
      width: 100%;
      background-color: #ef0f0f;
      color: #fff;
      font-weight: 700;
      padding: 10px;
      font-size: 14px;
      border-radius: 5px;
      border: none;
      cursor: pointer;
    }


    .login-container .btn-facebook {
      width: 100%;
      background-color: #4267B2;
      color: #fff;
      font-weight: 600;
      padding: 10px;
      font-size: 15px;
      border-radius: 5px;
      display: flex;
      flex-direction: row-reverse;
      align-items: center;
      justify-content: center;
      margin-bottom: 15px;
    }

    .btn-facebook i {
      margin:0 10px;

    }

    .or-divider {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 20px 0;
    }

    .or-divider::before,
    .or-divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background-color: #666;
    }

    .or-divider span {
      background-color: #fff;
      border: 1px solid #666;
      border-radius: 50%;
      padding: 2px 10px;
      margin: 0 10px;
      font-size: 14px;
      color: #666;
    }

    .form-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 13px;
      margin-top: 8px;
      margin-bottom: 15px;
    }

    .form-footer a {
      color: #007bff;
      text-decoration: underline;
    }

    .text-center {
      text-align: center;
    }

    .text-muted {
      color: #888;
      font-size: 14px;
      margin-top: 15px;
    }

    footer {
      background-color: #fff;
      padding: 15px;
      text-align: center;
      font-size: 13px;
      color: #aaa;
      border-top: 1px solid #ddd;
    }
  </style>
</head>
<body>
  <x-navbar />

  <main>
    <div class="login-container">
      <div class="header-button">دخول</div>

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email" class="form-label required">الموبايل أو البريد الإلكتروني</label>
        <input type="text" id="email" name="email" class="form-control" placeholder="أدخل الموبايل أو البريد الإلكتروني" required>
        @error('email')
          <div style="color: red; font-size: 12px;">{{ $message }}</div>
        @enderror

        <label for="password" class="form-label required">كلمة المرور</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="أدخل كلمة المرور" required>
        @error('password')
          <div style="color: red; font-size: 12px;">{{ $message }}</div>
        @enderror

        <div class="form-footer">
          <div>
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">تذكرني</label>
          </div>
          <div>
            <a href="{{ route('password.request') }}">نسيت كلمة المرور؟</a>
          </div>
        </div>

        <button type="submit" class="btn-vezeeta-primary">دخول</button>
      </form>

      <div class="or-divider"><span>أو</span></div>

      <button class="btn btn-facebook">
        <i class="fab fa-facebook-f"></i>
        فعّل حسابك مع فيسبوك
      </button>

      <p class="text-center text-muted">
        مستخدم جديد؟ <a href="{{ route('register') }}">انضم الآن</a>
      </p>
    </div>
  </main>

  <x-footer />
</body>
</html>
