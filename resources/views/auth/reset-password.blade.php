@extends('layouts.auth', ['title' => 'Reset Password'])
@section('content')
<div class="col-md-5">
<div class="card">
<div class="card-body">
@if (session('status'))
<div class="alert alert-success" role="alert">
{{ session('status') }}
</div>
@endif
<form method="POST" action="{{ route('password.update') }}">
@csrf
<input type="hidden" name="token"
value="{{ $request->route('token') }}">
<div class="form-group">
<label class="font-weight-bold textuppercase">Email Address</label>
<input id="email" type="email" class="form-control
@error('email') is-invalid @enderror"
name="email" value="{{ $request->email ??
old('email') }}" required autocomplete="email"
autofocus placeholder="Masukkan Alamat Elamil">
@error('email')
<div class="alert alert-danger mt-2">
<strong>{{ $message }}</strong>
</div>
@enderror
</div>
<div class="form-group">
<label class="font-weight-bold textuppercase">Password</label>
<input id="password" type="password" class="formcontrol @error('password') is-invalid
@enderror" name="password" required
autocomplete="new-password"
placeholder="Masukkan Password Baru">
@error('password')
<div class="alert alert-danger mt-2">
<strong>{{ $message }}</strong>
</div>
@enderror
</div>
<div class="form-group">
<label class="font-weight-bold textuppercase">Konfirmasi Password</label>
<input id="password-confirm" type="password"
class="form-control"
name="password_confirmation" required
autocomplete="new-password"
placeholder="Masukkan Konfirmasi Password
Baru">
</div>
<button type="submit" class="btn btn-primary btnblock">RESET PASSWORD</button>
</form>
</div>
</div>
</div>
@endsection