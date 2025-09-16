<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>اتصل بنا</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <x-style />
  <style>
    body {
      font-family: 'Cairo', sans-serif;
      background-color: #f0f2f5;
      margin: 0;
      padding: 0;
    }

    .contact-wrapper {
      max-width: 950px;
      margin: 30px auto;
      background-color: #fff;
      display: flex;
      padding: 20px 25px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .contact-info {
      width: 45%;
      border-right: 1px solid #e4e4e4;
      padding-left: 30px;
      text-align: right;
      margin-right: 20px;
      padding-right: 20px;
    }

    .contact-info h3 {
      color: #0070cd;
      font-size: 18px;
      margin-bottom: 10px;
    }

    .contact-info p {
      font-size: 13px;
      color: #444;
      margin: 4px 0;
    }

    .contact-info strong {
      display: block;
      font-size: 14px;
      color: #0070cd;
      margin-top: 15px;
    }

    .contact-info .social-icons {
      margin-top: 10px;
    }

    .contact-info .social-icons a {
      font-size: 24px;
      margin: 0 6px;
      color: #0070cd;
      text-decoration: none;
    }

    .contact-form {
      width: 55%;
    }

    .contact-form h3 {
      color: #0070cd;
      font-size: 18px;
      margin-bottom: 5px;
    }

    .contact-form p {
      font-size: 13px;
      color: #555;
      margin-bottom: 15px;
    }

    .form-group {
      margin-bottom: 10px;
    }

    .form-group label {
      display: block;
      font-size: 13px;
      color: #444;
      margin-bottom: 5px;
      font-weight: 600;
    }

    .form-group label::after {
      content: ' *';
      color: red;
    }

    .form-control {
      width: 100%;
      padding: 7px 10px;
      font-size: 13px;
      border: 1px solid #ccc;
      background-color: #f7f7f7;
      border-radius: 5px;
    }

    .input-group {
      display: flex;
      align-items: center;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f7f7f7;
      overflow: hidden;
    }

    .input-group select {
      padding: 7px;
      border: none;
      background: transparent;
      font-size: 13px;
      width: 50px;
      text-align: center;
      border-left: 1px solid #ccc;
    }

    .input-group input {
      flex: 1;
      padding: 7px;
      font-size: 13px;
      border: none;
      background: transparent;
      outline: none;
    }

    textarea.form-control {
      resize: vertical;
      height: 70px;
    }

    .submit-btn {
      background-color: #e63737;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 7px 18px;
      font-size: 13px;
      font-weight: bold;
      margin-top: 5px;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color: #c53030;
    }

    @media (max-width: 768px) {
      .contact-wrapper {
        flex-direction: column;
        padding: 20px;
      }

      .contact-info, .contact-form {
        width: 100%;
        border-right: none;
        padding-left: 0;
        margin-right: 0;
      }

      .contact-info {
        margin-top: 30px;
        text-align: right;
      }
    }
  </style>
</head>
<body>
  <x-navbar />

  <div class="contact-wrapper">
    <!-- Left side - form -->
    <div class="contact-form">
      <h3>اتصل بنا</h3>
      <p>نحن سعداء لتلقي استفساراتكم واقتراحاتكم.</p>
      <form>
        <div class="form-group">
          <label for="name">الاسم</label>
          <input type="text" id="name" name="name" class="form-control" placeholder="الاسم بالكامل" required>
        </div>

        <div class="form-group">
          <label for="mobileNumber">رقم الموبايل</label>
          <div class="input-group">
            <input type="tel" class="form-control" id="mobileNumber" placeholder="رقم الموبايل" required>
            <span class="input-group-text">
              <img src="https://flagcdn.com/w20/eg.png" alt="EG">
              <i class="fas fa-caret-down ms-1"></i>
            </span>
          </div>
        </div>

        <div class="form-group">
          <label for="email">البريد الإلكتروني</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="example@domain.com" required>
        </div>

        <div class="form-group">
          <label for="message">تعليقات</label>
          <textarea id="message" name="message" class="form-control" placeholder="اكتب رسالتك هنا..." required></textarea>
        </div>

        <button type="submit" class="submit-btn">إرسال</button>
      </form>
    </div>

    <!-- Right side - contact info -->
    <div class="contact-info">
      <h3>اتصل بنا</h3>
      <p>١٦٦٧٦ سعر مكالمة عادية</p>
      <p>من خارج مصر اتصل بـ:</p>
      <strong>+2 02 259 83 999</strong>

      <strong>العنوان</strong>
      <p>١٤ شارع عثمان بن عفان خلف الكلية الحربية - مصر الجديدة</p>

      <strong>راسلنا على</strong>
      <p>customercare@vezeeta.com</p>

      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-x-twitter"></i></a>
      </div>
    </div>
  </div>

  <x-footer />
</body>
</html>
