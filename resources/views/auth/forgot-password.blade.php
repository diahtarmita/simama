<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="styles.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <h2>FORGOT PASSWORD</h2>
      <div class="input-box">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
      </div>
      @error('email')
        <div class="alert alert-danger mt-2">
          <strong>{{ $message }}</strong>
        </div>
      @enderror
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif
      <button type="submit" class="btn btn-primary btn-block">SEND PASSWORD RESET LINK</button>
    </form>
  </div>
</body>
</html>
