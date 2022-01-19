@extends('layouts.app')

@section('content')
<div style="margin-top: 10px;" class="container">
    <div class="columns">
        <div class="column is-half
        is-offset-one-quarter">
            <div class="card">
                <div class="card-header"><p class="card-header-title">{{ __('Reset Password') }} </p></div>

                <div class="card-content">
                    @if (session('status'))
                        <div class="notification is-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="field">
                            <label for="email" class="label">Nhập địa chỉ email</label>

                            <div class="">
                                <input id="email" type="email" class="input @error('email') @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <div class="notification is-danger is-light">
                                  <strong>{{ $message }}</strong>
                                  </div>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <div class="">
                                <button type="submit" class="button is-primary">
                                    Gửi link reset mật khẩu
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
