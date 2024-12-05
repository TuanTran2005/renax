<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
  <style>
    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      position: relative;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 350px;
      padding: 40px;
    }

    .login__field {
      margin-bottom: 20px;
    }

    .login__input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-top: 10px;
    }

    .login__submit {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .login__submit:hover {
      background-color: #0056b3;
    }

    /* Success Message Styling */
    .login-success-message {
      position: absolute;
      top: 10px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
      padding: 15px 30px;
      border-radius: 5px;
      font-size: 14px;
      display: none;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      z-index: 100;
      animation: fadeIn 0.5s ease;
      display: flex;
      align-items: center;
    }

    .login-success-message i {
      margin-right: 10px;
      font-size: 18px;
    }

    /* Login Fail Message Styling */
    .login-fail-message {
      position: absolute;
      top: 10px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #fff;
      color: #d9534f;
      border: 1px solid #d9534f;
      padding: 15px 30px;
      border-radius: 5px;
      font-size: 14px;
      display: none;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      z-index: 100;
      animation: fadeIn 0.5s ease;
      display: flex;
      align-items: center;
    }

    .login-fail-message i {
      margin-right: 10px;
      font-size: 18px;
    }

    /* Animation for messages */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateX(-50%) translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
      }
    }

    .social-login {
      text-align: center;
      margin-top: 20px;
    }

    .social-login a {
      font-size: 20px;
      margin: 0 10px;
      color: #333;
      text-decoration: none;
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Success Message -->
  <div class="login-success-message" style="display:none" id="login-success-message">
    <i class="fas fa-check-circle"></i>
    <span>Đăng nhập thành công!</span>
  </div>
  
  <!-- Fail Message -->
  <div class="login-fail-message" style="display:none" id="login-fail-message">
    <i class="fas fa-times-circle"></i>
    <span>Đăng nhập thất bại. Kiểm tra lại thông tin.</span>
  </div>

  <form action="{{route('check')}}" method="post" class="login" id="login-form">
    <div class="login__field">
      <i class="login__icon fas fa-user"></i>
      <input type="text" class="login__input" name="nameLogin" placeholder="User name / Email" id="login-username" required>
    </div>
    <div class="login__field">
      <i class="login__icon fas fa-lock"></i>
      <input type="password" class="login__input" name="passwordLogin" placeholder="Password" id="login-password" required>
    </div>
    <button type="submit" name="checks" class="login__submit">
      <span class="button__text">Log In Now</span>
      <i class="button__icon fas fa-chevron-right"></i>
    </button>  
  </form>

  <!-- Social login section -->
  <div class="social-login">
    <h3>Log in via</h3>
    <a href="#" class="fab fa-facebook"></a>
    <a href="#" class="fab fa-twitter"></a>
    <a href="#" class="fab fa-google"></a>
  </div>
</div>

<script>

  @if (isset($_SESSION['login-fail-message']))
    setTimeout(function() {
      const failMessage = document.getElementById('login-fail-message');
      failMessage.style.display = 'flex';  // Hiển thị thông báo thất bại
    }, 2000); 

    setTimeout(function() {
      const failMessage = document.getElementById('login-fail-message');
      failMessage.style.display = 'none';  // Ẩn sau 3 giây
    }, 3000); 
  @elseif (isset($_SESSION['auth']))
    setTimeout(function() {
      const successMessage = document.getElementById('login-success-message');
      successMessage.style.display = 'flex';  // Hiển thị thông báo thành công
    }, 2000);

    setTimeout(function() {
      const successMessage = document.getElementById('login-success-message');
      successMessage.style.display = 'none';  // Ẩn sau 5 giây
      window.location.href = 'http://renax.test/userpage'; // Chuyển hướng đến trang mới

    }, 5000); 
  @endif
</script>



</body>
</html>
