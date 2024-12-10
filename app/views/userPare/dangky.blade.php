<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Ký</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
  <style>
    /* General Styles */
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: white;
    }

    .wrapper {
      display: flex
;
    width: 100%;
    max-width: 1100px;
    height: 661px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
    overflow: hidden;
}

    /* Left Section with Image */
    .left-section {
      width: 50%;
      background: url('https://i.pinimg.com/474x/e6/4a/2f/e64a2f781e31ef2527d0f5e1bd6d95e2.jpg') no-repeat center center/cover;
    }

    /* Right Section (Register Form) */
    .right-section {
      width: 50%;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    h1 {
      font-size: 2rem;
      margin-bottom: 20px;
      color: #333;
    }

    .login__field {
      margin-bottom: 8px;
      width: 100%;
    }

    .login__input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-size: 16px;
      margin-top: 10px;
      transition: border-color 0.3s;
    }

    .login__input:focus {
      border-color: #d92e2e;
      outline: none;
    }

    .button {
      width: 100%;
      padding: 12px;
      background-color: #d92e2e;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 0px;
      transition: background-color 0.3s;
    }

    .button:hover {
      background-color: #d92e2e;
    }

    .login__link {
      color: #007bff;
      text-decoration: none;
      font-size: 14px;
    }

    .login__link:hover {
      text-decoration: underline;
    }

    /* Success and Error Messages */
    .error-message {
      color: red;
      font-size: 12px;
      display: none;
    }

    /* Make the form responsive */
    @media (max-width: 768px) {
      .wrapper {
        flex-direction: column;
        height: auto;
        max-width: 100%;
      }

      .left-section, .right-section {
        width: 100%;
        height: auto;
      }

      .right-section {
        padding: 20px;
      }

      .button {
        padding: 10px;
        font-size: 14px;
      }
    }

    /* Style for the "Đăng ký qua" section */
    .social-login {
      margin-top: -8px;
      text-align: center;
    }

    .social-login p {
      font-size: -12px;
      color: #555;
      margin-bottom: 10px;
    }

    .social-button {
      padding: 10px 20px;
      margin: 5px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 14px;
      transition: background-color 0.3s;
    }

    .social-button.facebook {
      background-color: #3b5998;
      color: white;
    }

    .social-button.google {
      background-color: #db4437;
      color: white;
    }

    .social-button:hover {
      opacity: 0.8;
    }

    /* Ensure the text and buttons are centered on mobile */
    @media (max-width: 768px) {
      .social-login {
        margin-top: 10px;
      }

      .social-button {
        width: 100%;
        margin: 5px 0;
      }
    }
     /* Success and Error Messages */
     .message {
      position: fixed;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      padding: 15px 20px;
      border-radius: 8px;
      font-size: 16px;
      display: none;
      align-items: center;
      gap: 10px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      z-index: 1000;
      animation: fadeInOut 3s ease forwards;
    }

    .success-message {
      background: rgba(72, 201, 176, 0.9);
      color: white;
      border: 1px solid #1cc88a;
    }

    .fail-message {
      background: rgba(244, 67, 54, 0.9);
      color: white;
      border: 1px solid #e74c3c;
    }

    @keyframes fadeInOut {
      0% {
        opacity: 0;
        transform: translateX(-50%) translateY(-10px);
      }
      10%, 90% {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
      }
      100% {
        opacity: 0;
        transform: translateX(-50%) translateY(-10px);
      }
    }
  </style>
</head>
<body>

<div class="wrapper">
  <!-- Left Section with Image -->
  <div class="left-section"></div>
  
  <!-- Right Section (Register Form) -->
  <div class="right-section">
     <!-- Success Message -->
     <div class="message success-message" id="success-message">
      <i class="fas fa-check-circle"></i>
      <span>Đăng ký thành công!</span>
    </div>
    
    <!-- Fail Message -->
    <div class="message fail-message" id="fail-message">
      <i class="fas fa-times-circle"></i>
      <span>Đăng ký thất bại. Kiểm tra lại thông tin.</span>
    </div>
    <form action="{{route('dangkys')}}" method="post" enctype="multipart/form-data">
      <h1>Đăng Ký</h1>

      <!-- Name Field -->
      <div class="login__field">
        <input type="text" class="login__input" placeholder="Nhập tên của bạn" id="signup-name" name="name" required>
        <div class="error-message" id="signup-name-error">Vui lòng nhập tên</div>
      </div>

      <!-- Email Field -->
      <div class="login__field">
        <input type="email" class="login__input" placeholder="Nhập email của bạn" id="signup-email" name="email" required>
        <div class="error-message" id="signup-email-error">Vui lòng nhập email hợp lệ</div>
      </div>

      <!-- Password Field -->
      <div class="login__field">
        <input type="password" class="login__input" placeholder="Nhập mật khẩu" id="signup-password" name="password" required>
        <div class="error-message" id="signup-password-error">Vui lòng nhập mật khẩu (ít nhất 6 ký tự)</div>
      </div>

      <!-- Address Field -->
      <div class="login__field">
        <input type="text" class="login__input" placeholder="Nhập địa chỉ" id="signup-address" name="address" required>
        <div class="error-message" id="signup-address-error">Vui lòng nhập địa chỉ</div>
      </div>

      <!-- Phone Field -->
      <div class="login__field">
        <input type="tel" class="login__input" placeholder="Nhập số điện thoại" id="signup-phone" name="phone" required>
        <div class="error-message" id="signup-phone-error">Vui lòng nhập số điện thoại hợp lệ</div>
      </div>

      <!-- Date of Birth Field -->
      <div class="login__field">
        <input type="date" class="login__input" placeholder="Ngày sinh" id="signup-date" name="date_of_birth" required>
        <div class="error-message" id="signup-date-error">Vui lòng nhập ngày sinh</div>
      </div>

      <!-- Gender Field -->
      <div class="login__field">
        <select class="login__input" id="signup-gender" name="gender" required>
          <option value="">Chọn giới tính</option>
          <option value="male">Nam</option>
          <option value="female">Nữ</option>
          <option value="other">Khác</option>
        </select>
        <div class="error-message" id="signup-gender-error">Vui lòng chọn giới tính</div>
      </div>

      <!-- Profile Image Field -->
      <div class="login__field">
        <input type="file" class="login__input" placeholder="Tải ảnh đại diện" id="signup-image" name="profile_image" accept="image/*" required>
        <div class="error-message" id="signup-image-error">Vui lòng chọn ảnh</div>
      </div>

      <!-- Submit Button -->
      <button type="submit" name="dangky" class="button">Đăng ký</button>
    </form>

    <!-- Login link if already have account -->
    <div>
      <a href="{{route('login')}}" class="login__link">Đã có tài khoản? Đăng nhập</a>
    </div>
    
    <!-- Social Media Login -->
    <div class="social-login">
      <p>Đăng ký qua</p>
      <div>
        <button class="social-button facebook">Facebook</button>
        <button class="social-button google">Google</button>
      </div>
    </div>
  </div>
</div>

<script>
  @if (isset($_SESSION['on']))
    const successMessage = document.getElementById('success-message');
    successMessage.style.display = 'flex';
    setTimeout(() => successMessage.style.display = 'none', 3000);
    setTimeout(() => {
      window.location.href = 'http://renax.test/login'; 
    }, 3000);
  @elseif (isset($_SESSION['off']))
    const failMessage = document.getElementById('fail-message');
    failMessage.style.display = 'flex';
    setTimeout(() => failMessage.style.display = 'none', 3000);
    
  @endif
</script>
@php
unset($_SESSION['off']);
@endphp

</body>
</html>
