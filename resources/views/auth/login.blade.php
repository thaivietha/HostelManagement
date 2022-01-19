@extends('layouts.app')
@section('stylesheets')
@parent

<style type="text/css">
       .login{
            margin-top: 10px;
       }
</style>
@endsection
@section('content')
<div class="container login">
    <div class="columns">
        <div class="column is-half
        is-offset-one-quarter">
        <div class="card">
            <header class="card-header"><p class="card-header-title">Đăng nhập tài khoản chủ nhà</p>
            </header>

            <div class="card-content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="field">
                        <p class="control">
                        <input class="input" type="email" placeholder="{{ __('E-Mail Address') }}"name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <div class="notification is-danger is-light">
                          <strong>{{ $message }}</strong>
                          </div>
                          
                          @enderror
                        </p>
                    </div>
                    <div class="field">
                        <p class="control">
                            <input class="input" type="password" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">
                            @error('password')
                             <div class="notification is-danger is-light">
                              <strong>{{ $message }}</strong>
                          </div>
                        @enderror
                        </p>
                    </div>
        <!--             <div class="field">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>   -->
                    <div class="field">
                        <p class="control">
                            <button class="button is-primary" type="submit">
                                <i class="fas fa-sign-in-alt"></i>&nbsp;
                                Đăng nhập
                            </button>   

                        </p>

                    </div>
                    <div class="field">
                        <div class="control">
                             @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                Quên mật khẩu?
                            </a>
                            @endif      
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
