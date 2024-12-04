<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký tài khoản</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
  <style>
    /* Toàn bộ trang */
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f2f2f2;  /* Nền trang sáng */
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    /* Container chính */
    .container {
      width: 100%;
      max-width: 450px; /* Thu nhỏ chiều rộng của form */
      background-color: #ffffff;
      padding: 20px 30px; /* Giảm padding */
      border-radius: 8px; /* Bo tròn góc nhỏ hơn */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      text-align: center;
      box-sizing: border-box;
    }

    h3 {
      margin-bottom: 20px;
      color: #333;
      font-size: 24px; /* Giảm kích thước tiêu đề */
    }

    /* Các trường nhập liệu */
    .login__field {
      margin-bottom: 15px; /* Giảm khoảng cách giữa các trường nhập liệu */
      position: relative;
    }

    /* Định dạng ô input */
    .login__input {
      width: 100%;
      padding: 10px;
      border-radius: 6px; /* Bo tròn góc nhỏ hơn */
      border: 1px solid #ddd;
      font-size: 14px;
      color: #333;
      background-color: #f9f9f9;
      box-sizing: border-box;
      outline: none;
      transition: 0.3s;
    }

    .login__input:focus {
      border-color: #4CAF50;  /* Màu sắc khi focus */
      background-color: #fff;
    }

    /* Icon ngoài input */
    .login__icon {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 18px; /* Kích thước icon */
      color: #4CAF50;
    }

    /* Các thông báo lỗi */
    .error-message {
      color: red;
      font-size: 12px;
      display: none;
      margin-top: 5px;
    }

    /* Nút đăng ký */
    .button {
      width: 100%;
      padding: 12px;
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s;
      margin-top: 15px;
    }

    .button:hover {
      background-color: #45a049;
    }

    /* Liên kết chuyển giữa đăng nhập và đăng ký */
    .form-toggle {
      margin-top: 12px;
      font-size: 14px;
    }

    .form-toggle a {
      color: #4CAF50;
      text-decoration: none;
    }

    .form-toggle a:hover {
      text-decoration: underline;
    }

    /* Background Gradient */
    .screen__background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, #4CAF50, #8BC34A);
      z-index: -1;
      border-radius: 8px;
    }

    /* Các trường đặc biệt như ảnh đại diện và giới tính */
    .login__input[type="file"] {
      padding: 8px;
      font-size: 12px;
    }
    
    select {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ddd;
      font-size: 14px;
      background-color: #f9f9f9;
      outline: none;
    }
  </style>
</head>
<body>

  <div class="container">
    <h3>Đăng ký tài khoản</h3>
    <form action="{{route('dangkys')}}" method="post" enctype="multipart/form-data">
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
      <button type="submit" name="dangky" onclick="dangky()" class="button">Đăng ký</button>
    </form>

    <p class="form-toggle">
      <a href="#">Đã có tài khoản? Đăng nhập</a>
    </p>
  </div>

  <div class="screen__background"></div>

  <script>
    document.getElementById('signup-form').addEventListener('submit', function(event) {
      event.preventDefault();
      
      const name = document.getElementById('signup-name').value;
      const username = document.getElementById('signup-username').value;
      const email = document.getElementById('signup-email').value;
      const password = document.getElementById('signup-password').value;
      const address = document.getElementById('signup-address').value;
      const phone = document.getElementById('signup-phone').value;
      const date = document.getElementById('signup-date').value;
      const status = document.getElementById('signup-status').value;
      const gender = document.getElementById('signup-gender').value;
      const image = document.getElementById('signup-image').files[0];

      let isValid = true;
     function dangky(){
        alert("Đăng ký thành công");
     }
      // Reset các thông báo lỗi
      document.querySelectorAll('.error-message').forEach(function(error) {
        error.style.display = 'none';
      });

      // Kiểm tra các trường nhập liệu
      if (!name) {
        document.getElementById('signup-name-error').style.display = 'block';
        isValid = false;
      }
      if (!username) {
        document.getElementById('signup-username-error').style.display = 'block';
        isValid = false;
      }
      if (!email) {
        document.getElementById('signup-email-error').style.display = 'block';
        isValid = false;
      }
      if (!password) {
        document.getElementById('signup-password-error').style.display = 'block';
        isValid = false;
      }
      if (!address) {
        document.getElementById('signup-address-error').style.display = 'block';
        isValid = false;
      }
      if (!phone) {
        document.getElementById('signup-phone-error').style.display = 'block';
        isValid = false;
      }
      if (!date) {
        document.getElementById('signup-date-error').style.display = 'block';
        isValid = false;
      }
      if (!status) {
        document.getElementById('signup-status-error').style.display = 'block';
        isValid = false;
      }
      if (!gender) {
        document.getElementById('signup-gender-error').style.display = 'block';
        isValid = false;
      }
      if (!image) {
        document.getElementById('signup-image-error').style.display = 'block';
        isValid = false;
      }

      if (isValid) {
        alert('Đăng ký thành công!');
      } else {
        alert('Vui lòng sửa các lỗi và thử lại.');
      }
    });
  </script>

</body>
</html>
