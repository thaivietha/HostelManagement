@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <header class="card-header"><p class="card-header-title">Xin chào {{ Auth::user()->name }}</p> </header>

        <div class="card-content">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            {{ __('You are logged in!') }}
        </div>
    </div>
</div>
@endsection
