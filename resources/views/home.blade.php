@extends('layouts.app')

@section('content')
    <div class="top">
        <h1>{{ Auth::user()->name }}{{__('さんのペット') }}</h1>

        <a class="link" href="/puls">{{ __('追加') }}</a>
        @if (session('flash_message'))
        <div class="flash_message">
            {{ session('flash_message') }}
        </div>
        @endif
    </div>

    <ul class="pet-block">
        <div  class="pet-line">
          @foreach ($pets as $pet)
          <div class="pet-meal" data-id={{ $pet->id }}>
              <div class="pet-name">
                <img src="/img/{{ $pet->body }}.png">
                <span>{{ $pet->name }}</span>
              </div>
              <div class ="petstatus">
                <ul class="meal-list" data-id="{{ $pet->id }}">
                    <li>
                        <button data-id="{{ $pet->id }}" data-name="breakfast" class="
                        record-btn morning" ><img src="/img/breakfast.png">{{ __(' 朝ごはん') }}</button>
                        <div></div>
                    </li>
                    <li>
                        <button data-id="{{ $pet->id }}" data-name="lunch" class="
                        record-btn noon" ><img src="/img/lunch.png">{{ __(' 昼ごはん') }}</button>
                        <div></div>
                    </li>
                    <li>
                        <button data-id="{{ $pet->id }}" data-name="dinner" class="
                        record-btn night" ><img src="/img/dinner.png">{{ __(' 夜ごはん') }}</button>
                        <div></div>
                    </li>
                    <div class="on" data-id="{{ $pet->id }}">
                    </div>
                </ul>
                <div id="{{ $pet->id }}" data-id="{{ $pet->id }}" class="chart"></div>
              </div>
          </div>



          <div class="pet-list">
              <form method="post" action="{{ route('destroy',$pet) }}" >
                  @method('DELETE')
                  @csrf
                  <button class="delete-btn" data-id="{{ $pet->id }}">{{__('derete') }}</button>
              </form>
          </div>
          @endforeach
        </div>
      </ul>

      <script src="https://www.gstatic.com/charts/loader.js"></script>
@endsection
