@extends('layouts.fe')

@section('content')
Profile

<div class="input-box">
        <input type="text" name="name" value="{{old('name') }}" class="@error('name') is-invalid @enderror" placeholder="Full Name" required>
      </div>
@endsection