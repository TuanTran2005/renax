<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
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
      display: flex;
      width: 800px;
      height: 500px;
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

    /* Right Section (Login Form) */
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
      margin-bottom: 20px;
      width: 100%;
    }

    .login__input {
      width: 100%;
      padding: 12px;
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

    .login__submit {
      width: 100%;
      padding: 12px;
      background-color: #d92e2e;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 20px;
      transition: background-color 0.3s;
    }

    .login__submit:hover {
      background-color:#d92e2e;
    }

    .register__button {
      width: 100%;
      padding: 12px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 10px;
      transition: background-color 0.3s;
    }

    .register__button:hover {
      background-color: #218838;
    }

    .social-login {
      text-align: center;
      margin-top: 20px;
    }

    .social-login a {
      font-size: 24px;
      margin: 0 10px;
      color: #333;
      text-decoration: none;
      transition: color 0.3s;
    }

    .social-login a:hover {
      color: #4e73df;
    }

    /* Success and Error Messages */
    .login-message {
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

    .login-success-message {
      background: rgba(72, 201, 176, 0.9); /* Greenish background */
      color: white;
      border: 1px solid #1cc88a;
    }

    .login-fail-message {
      background: rgba(244, 67, 54, 0.9); /* Reddish background */
      color: white;
      border: 1px solid #e74c3c;
    }

    .login-message i {
      font-size: 18px;
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
  <!-- Left Section -->
  <div class="left-section"></div>

  <!-- Right Section -->
  <div class="right-section">
    <!-- Success Message -->
    <div class="login-message login-success-message" id="login-success-message">
      <i class="fas fa-check-circle"></i>
      <span>Đăng nhập thành công!</span>
    </div>
    
    <!-- Fail Message -->
    <div class="login-message login-fail-message" id="login-fail-message">
      <i class="fas fa-times-circle"></i>
      <span>Đăng nhập thất bại. Kiểm tra lại thông tin.</span>
    </div>

    <h1>Đăng Nhập</h1>
    <form action="{{route('check')}}" method="post" class="login" id="login-form">
      <div class="login__field">
        <input type="text" class="login__input" name="nameLogin" placeholder="User name / Email" id="login-username" required>
      </div>
      <div class="login__field">
        <input type="password" class="login__input" name="passwordLogin" placeholder="Password" id="login-password" required>
      </div>
      <button type="submit" name="checks" class="login__submit">
        Đăng nhập ngay
      </button>
    </form>

   
   
   <a href="{{route('register')}}"> Đăng ký tài khoản</a>  
   

  
    <div class="social-login">
      <h3>Đăng nhập qua</h3>
      <a href="#" class="fab fa-facebook"></a>
      <a href="#" class="fab fa-twitter"></a>
      <a href="#" class="fab fa-google"></a>
    </div>
  </div>
</div>

<script>
  @if (isset($_SESSION['login-fail-message']))
    setTimeout(() => {
      const failMessage = document.getElementById('login-fail-message');
      failMessage.style.display = 'flex';  // Hiển thị thông báo thất bại
    }, 500);

    // Ẩn thông báo sau 3 giây
    setTimeout(() => {
      const failMessage = document.getElementById('login-fail-message');
      failMessage.style.display = 'none';  // Ẩn sau 3 giây
    }, 3000); 
  @elseif (isset($_SESSION['auth']))
    setTimeout(() => {
      const successMessage = document.getElementById('login-success-message');
      successMessage.style.display = 'flex';  // Hiển thị thông báo thành công
    }, 500);

    // Chuyển hướng sau 3 giây
    setTimeout(() => {
      window.location.href = 'http://renax.test//'; // Chuyển hướng đến trang mới
    }, 3000);
  @endif
</script>

</body>
</html>
