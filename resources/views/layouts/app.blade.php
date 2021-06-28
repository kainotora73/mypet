<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('My pet') }}</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <div id="app"></div>
    <header >
        <a class="mypet" href="{{ route('signup') }}">
            {{__('My PET')}}
        </a>
        <ul class="status">
            @guest
                @if (Route::has('login'))
                    <li class="status-item">
                        <a  class="status-link"  href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="status-item">
                        <a  class="status-link"  href="{{ route('register') }}">{{ __('新規登録') }}</a>
                    </li>
                @endif
            @else
                <li class="status-item">
                    <a href="{{ url('/password/change') }}"><img src="/img/set.png"></a>
                    <a class="status-link"  href="{{ route('home') }}">
                        {{ Auth::user()->name }}
                    </a>

                    <div>
                        <a class="status-link"  href="{{ route('logout') }}"
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
        </ul>
    </header>

    @yield('content')

    <script src="{{ asset('js/app.js') }}" defer></script>


</body>
</html>
