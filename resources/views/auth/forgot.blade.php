@extends('layouts.auth')
@section('content')
<h4 class="mb-2">Forgot Password? 🔒</h4>
<p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
<form id="formAuthentication" class="mb-3" action="index.html" method="POST">
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input
      type="text"
      class="form-control"
      id="email"
      name="email"
      placeholder="Enter your email"
      autofocus
    />
  </div>
  <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
</form>
<div class="text-center">
  <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
    Back to login
  </a>
</div>
@endsection