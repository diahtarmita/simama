<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
  <link rel="stylesheet" href="styles.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form action="{{ route('register') }}" method="POST">
      @csrf
      <h1>REGISTER</h1>
      <div class="input-box">
        <input type="text" name="name" value="{{old('name') }}" class="@error('name') is-invalid @enderror" placeholder="Full Name" required>
      </div>
      @error('name')
      <div class="alert alert-danger mt-2">{{ $message }}</div>
      @enderror
      <div class="input-box">
        <input type="email" name="email" value="{{old('email') }}" class="@error('email') is-invalid @enderror" placeholder="Email address" required>
      </div>
      @error('email')
      <div class="alert alert-danger mt-2">{{ $message }}</div>
      @enderror
      <div class="input-box">
        <input type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Password" required>
      </div>
      @error('password')
      <div class="alert alert-danger mt-2">{{ $message }}</div>
      @enderror
      <div class="input-box">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
      </div>
      <button type="submit" class="btn">REGISTER</button>
    </form>
    <div class="register-link">
      <p>Already have an account? <a href="/login">Login</a></p>
    </div>
  </div>
</body>
</html>
