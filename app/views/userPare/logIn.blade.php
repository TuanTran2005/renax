<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CodePen - A Pen by Mohithpoojary</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css">
  <link rel="stylesheet" href="css/login.css">
  <style>
    /* Add custom error messages styling */
    .error-message {
      color: red;
      font-size: 12px;
      display: none;
    }

    .form-toggle {
      cursor: pointer;
      color: #007bff;
      text-decoration: underline;
      font-size: 14px;
    }
  </style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<!-- Login Form -->
             <form action="" method="post"></form>
			<form action="{{route('check')}}" method="post"  class="login" id="login-form">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" name="nameLogin" placeholder="User name / Email" id="login-username" required>
					<div class="error-message" id="login-username-error" >Vui lòng nhập tên đăng nhập hoặc email</div>
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" name="passwordLogin" placeholder="Password" id="login-password" required>
					<div class="error-message" id="login-password-error">Vui lòng nhập mật khẩu</div>
				</div>
				<button type="submit" name="checks" class="button login__submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>

			<!-- Success message -->
			<div class="success-message" id="success-message">
				
			</div>

			<!-- Social login section -->
			<div class="social-login">
				<h3>Log in via</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>

			<!-- Sign Up Section -->
			<div id="signup-form" style="display: none;">
				<h3>Create an Account</h3>
				<form class="signup">
					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
						<input type="text" class="login__input" placeholder="Enter your username" id="signup-username" required>
						<div class="error-message" id="signup-username-error">Vui lòng nhập tên người dùng</div>
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-envelope"></i>
						<input type="email" class="login__input" placeholder="Email" id="signup-email" required>
						<div class="error-message" id="signup-email-error">Vui lòng nhập email hợp lệ</div>
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" class="login__input" placeholder="Password" id="signup-password" required>
						<div class="error-message" id="signup-password-error">Vui lòng nhập mật khẩu (ít nhất 6 ký tự)</div>
					</div>
					<button type="submit" class="button login__submit">
						<span class="button__text">Sign Up</span>
						<i class="button__icon fas fa-chevron-right"></i>
					</button>
				</form>
			</div>

			<p class="form-toggle" id="toggle-signup">Bạn chưa có tài khoản? Đăng ký tại đây</p>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
<!-- partial -->

<script>
  // Toggle between login and signup forms
  const toggleSignup = document.getElementById('toggle-signup');
  const signupForm = document.getElementById('signup-form');
  const loginForm = document.getElementById('login-form');

  toggleSignup.addEventListener('click', () => {
    loginForm.style.display = loginForm.style.display === 'none' ? 'block' : 'none';
    signupForm.style.display = signupForm.style.display === 'none' ? 'block' : 'none';
    toggleSignup.textContent = toggleSignup.textContent.includes('Đăng ký')
      ? "Đã có tài khoản? Đăng nhập tại đây"
      : "Bạn chưa có tài khoản? Đăng ký tại đây";
  });

  // Handle login form submission
  const loginButton = document.querySelector('.login__submit');
  const successMessage = document.getElementById('success-message');

  loginButton.addEventListener('click', (event) => {
    event.preventDefault();  // Prevent form submission

    const username = document.getElementById('login-username').value;
    const password = document.getElementById('login-password').value;

    // Reset error messages
    document.getElementById('login-username-error').style.display = 'none';
    document.getElementById('login-password-error').style.display = 'none';

    let isValid = true;

    if (!username) {
      document.getElementById('login-username-error').style.display = 'block';
      isValid = false;
    }

    if (!password) {
      document.getElementById('login-password-error').style.display = 'block';
      isValid = false;
    }

    
  });

  // Handle signup form submission (validate fields)
  const signupButton = document.querySelector('.signup .login__submit');

  signupButton.addEventListener('click', (event) => {
    event.preventDefault();

    const signupUsername = document.getElementById('signup-username').value;
    const signupEmail = document.getElementById('signup-email').value;
    const signupPassword = document.getElementById('signup-password').value;

    // Reset error messages
    document.getElementById('signup-username-error').style.display = 'none';
    document.getElementById('signup-email-error').style.display = 'none';
    document.getElementById('signup-password-error').style.display = 'none';

    let isValid = true;

    if (!signupUsername) {
      document.getElementById('signup-username-error').style.display = 'block';
      isValid = false;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!signupEmail || !emailPattern.test(signupEmail)) {
      document.getElementById('signup-email-error').style.display = 'block';
      isValid = false;
    }

    if (!signupPassword || signupPassword.length < 6) {
      document.getElementById('signup-password-error').style.display = 'block';
      isValid = false;
    }

    if (isValid) {
      alert('Đăng ký thành công! Bây giờ bạn có thể đăng nhập.');
      toggleSignup.click();  // Automatically switch to login form
    } else {
      alert('Vui lòng kiểm tra các trường và thử lại.');
    }
  });
</script>

</body>
</html>
