@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-v1 px-2">
  <div class="auth-inner py-2">
    <!-- Register v1 -->
    <div class="card mb-0">
      <div class="card-body">
          <a href="/" class="brand-logo">
              <h2 class="brand-text text-primary ms-1">SocialProtection</h2>
          </a>
        <form class="auth-register-form mt-2" method="POST" action="{{ route('register') }}">
          @csrf
          <div class="mb-1">
            <label for="register-username" class="form-label">Логин</label>
            <input
              required
              type="text"
              class="form-control @error('name') is-invalid @enderror"
              id="register-username"
              name="name"
              placeholder="Ivan"
              aria-describedby="register-username"
              tabindex="1"
              autofocus
              value="{{ old('name') }}"
            />
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-1">
            <label for="register-email" class="form-label">Email</label>
            <input
              required
              type="text"
              class="form-control @error('email') is-invalid @enderror"
              id="register-email"
              name="email"
              placeholder="ivan@example.com"
              aria-describedby="register-email"
              tabindex="2"
              value="{{ old('email') }}"
            />
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="mb-1">
            <label for="register-password" class="form-label">Пароль</label>

            <div class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
              <input
                required
                type="password"
                class="form-control form-control-merge @error('password') is-invalid @enderror"
                id="register-password"
                name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="register-password"
                tabindex="3"
              />
              <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="mb-1">
            <label for="register-password-confirm" class="form-label">Повторите пароль</label>

            <div class="input-group input-group-merge form-password-toggle">
              <input
                type="password"
                class="form-control form-control-merge"
                id="register-password-confirm"
                name="password_confirmation"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="register-password"
                tabindex="3"
              />
              <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
          </div>

          <div class="mb-1">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="register-privacy-policy" tabindex="4" required/>
              <label class="form-check-label" for="register-privacy-policy">
                Я согласен с <a href="#">политикой конфиденциальности и условиями</a>
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100" tabindex="5">Зарегистрироваться</button>
        </form>

        <p class="text-center mt-2">
          <span>У меня уже есть аккаунт?</span>
          @if (Route::has('login'))
          <a href="{{ route('login') }}">
            <span>Войти</span>
          </a>
          @endif
        </p>
        </div>
      </div>
    </div>
    <!-- /Register v1 -->
  </div>
</div>
@endsection
