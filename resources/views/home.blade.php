<x-app-layout>
    {{-- pet_tab --}}
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item pagetab">
            <a class="nav-link active" id="item1-tab" data-toggle="tab" href="#item1" role="tab" aria-controls="item1" aria-selected="true">{{ __('マイページ') }}</a>
          </li>
        @foreach ($pets as $pet)
        <li class="nav-item">
            <a class="nav-link pagetab" data-id="{{ $pet->id }}" id="item{{ ++$tubnumber }}-tab" data-toggle="tab" href="#item{{ $tubnumber }}" role="tab" aria-controls="item{{ $tubnumber }}" aria-selected="false">{{ $pet->name }}</a>
        </li>
        @endforeach
    </ul>

    <div class="card mt-4 mx-auto tab-content w-auto" id="myTabs">
        {{-- card mypage --}}
        <div class="tab-pane fade show active" id="item1" role="tabpanel" aria-labelledby="item1-tab">
            <div class="card mt-4 mx-auto w-auto text-center">

                <div class="card-body">
                    @if (Auth::id() == 1)
                    <button class="mt-3 btn btn-outline-info block col-sm-4" disabled>{{ __('ペット登録') }}</button>
                    @else
                    <a class="mt-3 btn btn-outline-info block col-sm-4" href="/puls">{{ __('ペット登録') }}</a>
                    @endif


                    <div class="dropdown dropright">
                        @if (Auth::id() == 1)
                        <button type="button" id="dropdown1"
                        class="mt-3 btn btn-outline-info dropdown-toggle block col-sm-4" disabled>{{ __('ペット情報削除')}}</button>
                        @else
                        <button type="button" id="dropdown1"
                        class="mt-3 btn btn-outline-info dropdown-toggle block col-sm-4"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">{{ __('ペット情報削除')}}</button>
                        @endif
                        <div  class="dropdown-menu" aria-labelledby="dropdown1">
                            @foreach ($pets as $pet)
                            <form method="post" action="{{ route('destroy',$pet) }}" >
                                @method('DELETE')
                                @csrf
                                <button class="delete-btn dropdown-item" data-id="{{ $pet->id }}">{{ $pet->name }}</button>
                            </form>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-3 btn btn-outline-info block col-sm-4 mb-3" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('ログアウト') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- card pet/foreach --}}
        @foreach ($pets as $pet)
        <div class="tab-pane fade" id="item{{ ++$cardnumber }}" role="tabpanel" aria-labelledby="item{{ $cardnumber }}-tab">
            <div class="card-header">
                <img src="/img/{{ $pet->body }}.png">
                <h2 class="pt-2 display-5 d-inline-block"> {{ $pet->name }}</span>
            </div>
            <div class="card-body container-fruid">
                <div class="pet-meal raw d-flex" data-id={{ $pet->id }}>
                    <div class="d-inline-block col-4 text-center">
                        {{-- breakfast_recordbutton & chart --}}
                        @if (Auth::id() == 1)
                        <button data-id="{{ $pet->id }}" data-name="breakfast" class="
                        record-btn morning btn btn-outline-danger btn-lg" disabled><img src="/img/breakfast.png">{{ __(' 朝ごはん') }}</button>
                        @else
                        <button data-id="{{ $pet->id }}" data-name="breakfast" id="{{ $pet->id }}morning-record"  class="
                        record-btn morning btn btn-outline-danger btn-lg"><img src="/img/breakfast.png">{{ __(' 朝ごはん') }}</button>
                        @endif
                        <button data-name="morning-back" data-id="{{ $pet->id }}" id="{{ $pet->id }}morning-back" class="back-btn btn btn-outline-dark" disabled>{{ __('一つ戻す') }}</button>
                        <div id="{{ $pet->id }}morning"></div>
                    </div>
                    <div class ="d-inline-block col-4 text-center">
                        {{-- lunch_recordbutton & chart --}}
                        @if (Auth::id() == 1)
                        <button data-id="{{ $pet->id }}" data-name="lunch" class="
                        record-btn noon btn btn-outline-warning btn-lg" disabled><img src="/img/lunch.png">{{ __(' 昼ごはん') }}</button>
                        @else
                        <button data-id="{{ $pet->id }}" data-name="lunch"  id="{{ $pet->id }}noon-record"  class="
                        record-btn noon btn btn-outline-warning btn-lg" ><img src="/img/lunch.png">{{ __(' 昼ごはん') }}</button>
                        @endif
                        <button data-name="noon-back" data-id="{{ $pet->id }}" id="{{ $pet->id }}noon-back" class="back-btn btn btn-outline-dark" disabled>{{ __('一つ戻す') }}</button>
                        <div id="{{ $pet->id }}noon"></div>
                    </div>
                    <div class="d-inline-block col-4 text-center">
                        {{-- dinner_recrdbutton & chart --}}
                        @if (Auth::id() == 1)
                        <button data-id="{{ $pet->id }}" data-name="dinner" class="
                        record-btn night btn btn-outline-primary btn-lg" disabled><img src="/img/dinner.png">{{ __(' 夜ごはん') }}</button>
                        @else
                        <button data-id="{{ $pet->id }}" data-name="dinner" id="{{ $pet->id }}night-record"  class="
                        record-btn night btn btn-outline-primary btn-lg" ><img src="/img/dinner.png">{{ __(' 夜ごはん') }}</button>
                        @endif
                        <button data-name="night-back" data-id="{{ $pet->id }}" id="{{ $pet->id }}night-back" class="back-btn btn btn-outline-dark" disabled>{{ __('一つ戻す') }}</button>
                        <div id="{{ $pet->id }}night"></div>
                    </div>
                </div>
                <div id="{{ $pet->id }}" data-id="{{ $pet->id }}" class="chart"></div>
            </div>
        </div>
        @endforeach

    </div>

    <script src="https://www.gstatic.com/charts/loader.js"></script>
</x-app-layout>
