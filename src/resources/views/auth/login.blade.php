@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-v1 px-2">
  <div class="auth-inner py-2">
    <!-- Login v1 -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="/" class="brand-logo">
          <h2 class="brand-text text-primary ms-1">SocialProtection</h2>
        </a>
        <h4 class="card-title mb-1">Добро пожаловать в портал SocialProtection!</h4>
        <p class="card-text mb-2">Пожалуйста, войдите в свой аккаунт</p>

        <form class="auth-login-form mt-2" method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-1">
            <label for="login-email" class="form-label">Email</label>
            <input
              type="text"
              class="form-control @error('email') is-invalid @enderror"
              id="login-email"
              name="email"
              placeholder="admin@admin.com"
              aria-describedby="login-email"
              tabindex="1"
              autofocus
              value="{{ old('email') }}"
            />
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="mb-1">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="login-password">Password</label>
              @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}">
                <small>Forgot Password?</small>
              </a>
              @endif
            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input
                type="password"
                class="form-control form-control-merge"
                id="login-password"
                name="password"
                tabindex="2"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="login-password"
              />
              <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
          </div>
          <div class="mb-1">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember" name="remember" tabindex="3" {{ old('remember') ? 'checked' : '' }} />
              <label class="form-check-label" for="remember"> Remember Me </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100" tabindex="4">Вход</button>
        </form>

        <p class="text-center mt-2">
          @if (Route::has('register'))
          <a href="{{ route('register') }}">
            <span>Подключиться к системе</span>
          </a>
          @endif
        </p>
        </div>
      </div>
    </div>
    <!-- /Login v1 -->
  </div>
</div>
@endsection
