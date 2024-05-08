<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="styles.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <a href=""></a>
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <h1>LOGIN</h1>
      <div class="input-box">
        <input type="text" placeholder="Email" name="email" value="{{ old('email') }}" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" name="password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>
      @if ($errors->has('email') || $errors->has('password'))
        <div class="alert alert-danger mt-2">
          Invalid email or password.
        </div>
      @endif
      <div class="remember-forgot">
        <span></span>
        <a href="/forgot-password">Forgot Password</a>
      </div>
      <button type="submit" class="btn">Login</button>
      <div class="register-link">
        <p>Don't have an account? <a href="/register">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>
