<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <x-style />
  <style>
    * {
      box-sizing: border-box;
    }

    html, body {
      margin: 0;
      padding: 0;
      font-family: 'Cairo', sans-serif;
      background-color: #f0f2f5;
      height: 100%;
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

    .reset-container {
      background-color: #fff;
      width: 90%;
      max-width: 400px;
      padding: 25px 20px;
      border-radius: 8px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      text-align: center;
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

    .text-gray {
      color: #555;
      font-size: 14px;
      margin-bottom: 15px;
    }

    .form-control {
      width: 100%;
      font-size: 14px;
      padding: 8px;
      background-color: #f7f7f7;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 15px;
    }

    .btn-vezeeta-primary {
      background-color: #ef0f0f;
      color: #fff;
      font-weight: 700;
      padding: 10px 15px;
      font-size: 14px;
      border-radius: 5px;
      border: none;
      cursor: pointer;
    }

    .link-back {
      display: inline-block;
      margin-top: 20px;
      font-size: 14px;
      color: #007bff;
      font-weight: 600;
      text-decoration: underline;
    }

    .error-message {
      color: red;
      font-size: 12px;
      margin-bottom: 10px;
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
    <div class="reset-container">
      <div class="header-button">نسيت كلمة المرور؟</div>

      <p class="text-gray">لا توجد مشكلة، سنساعدك في استعادتها.</p>
      <p class="text-gray">ادخل البريد الإلكتروني لاسترجاع كلمة المرور الخاصة بك</p>

      @if (session('status'))
        <div style="color: green; font-size: 13px; margin-bottom: 10px;">
          {{ session('status') }}
        </div>
      @endif

      <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <input type="email" id="email" name="email" class="form-control" placeholder="example@email.com" required>
        @error('email')
          <div class="error-message">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn-vezeeta-primary">احصل على كلمة مرور جديدة</button>
      </form>

      <a href="{{ route('login') }}" class="link-back">او العودة الى صفحة تسجيل الدخول</a>
    </div>
  </main>

  <x-footer />
</body>
</html>
