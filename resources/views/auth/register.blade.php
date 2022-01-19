@extends('layouts.app')
@section('stylesheets')
@parent

<style type="text/css">
       .register{
            margin-top: 10px;
       }
</style>
@endsection
@section('content')
<div class="container register">
    <div class="columns">
        <div class="column is-half
        is-offset-one-quarter">
        <div class="card">
            <header class="card-header"><p class="card-header-title">Đăng ký tài khoản</p>
            </header>

            <div class="card-content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="field">
                        <p class="control">
                            <input class="input" type="name" placeholder="{{ __('Họ và tên') }}"name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <div class="notification is-danger is-light">
                              <strong>{{ $message }}</strong>
                          </div>
                            @enderror
                        </p>
                    </div>
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
                            <input class="input" type="password" placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password">
                            @error('password')
                            <div class="notification is-danger is-light">
                              <strong>{{ $message }}</strong>
                          </div>

                        <!--   <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> -->
                        @enderror
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                        <input class="input" id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autocomplete="new-password">
                        
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                        <button class="button is-primary" type="submit">
                            {{ __('Đăng ký') }}
                        </button>

                    </p>
                </div>

            </form>

        </div>
    </div>

    </div>
    </div>

</div>
@endsection
