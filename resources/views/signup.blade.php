<x-app-layout>
<div class="container">
    <h1 class="display-4 text-center pt-5 pb-5">{{ __('Welcome My pet') }}</h1>
    <p></p>
        <div class="row ">
            @guest
                <a class="d-inline-block col-4 btn btn-outline-info px-5" role="button" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                <a class="d-inline-block col-4 btn btn-outline-info text-center" role="button" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                <a class="d-inline-block col-4 btn btn-outline-secondary" role="button" href="{{ route('login.guest') }}" data-toggle="tooltip" title="{{ __('お試しログインの為、編集はできません') }}">{{ __('ゲストログイン') }}</a>

            @else
                <a class="d-inline-block col-6 btn btn-outline-info" role="button"  href="{{ route('home') }}">
                    {{ Auth::user()->name }}
                </a>
                <div class="d-inline-block col-6 btn btn-outline-info" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('ログアウト') }}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endguest
        </div>
</div>
</x-app-layout>
