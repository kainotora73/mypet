@extends('layouts.app')

@section('content')

<div class="top">
    <h1>{{ __('Welcome My pet') }}</h1>
    @guest
        <a class="link" href="{{ route('login') }}">{{ __('Login') }}</a>
        <a class="link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
        <a class="link" href="{{ route('login.guest') }}">{{ __('ゲストログイン') }}</a>


    @else



        <li class="status">
            <a class="link"  href="{{ route('home') }}">
                {{ Auth::user()->name }}
            </a>

            <div>
                <a class="link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest


</div>

@endsection
