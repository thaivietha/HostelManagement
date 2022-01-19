@extends('layouts.app')

@section('content')
<div style="margin-top: 10px;" class="container">
    <div class="columns">
        <div class="column is-half
        is-offset-one-quarter">
            <div class="card">
                <div class="card-header">
                    <p class="card-header-title">{{ __('Đổi mật khẩu') }}</p>
                    </div>

                <div class="card-content">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="field">
                            <label for="email" class="label">{{ __('Địa chỉ email') }}</label>

                            <div class="">
                                <input id="email" type="email" class="input @error('email') @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" >

                                @error('email')
                                    <div class="notification is-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label for="password" class="label">{{ __('Mật khẩu') }}</label>

                            <div class="">
                                <input id="password" type="password" class="input @error('password') @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <div class="notification is-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label for="password-confirm" class="label">{{ __('Xác nhận mật khẩu') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="field">
                            <div class="">
                                <button type="submit" class="button is-success">
                                    {{ __('Hoàn tất') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
