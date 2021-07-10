<x-app-layout>

        <div class="card mt-4 mx-auto  w-75">
            <div class="card-header">{{__('ログイン')}}</div>
            <div class="card-body">
                <x-auth-session-status class="mb-4 alert alert-success text-center" :status="session('status')" />
                <x-auth-validation-errors class="mb-4 alert alert-danger text-center" :errors="$errors" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row form-group">
                        <x-label class="col-sm-4" for="email" :value="__('メールアドレス')" />
                        <div class="col-sm-8">
                            <x-input id="email" class="block mt-1 form-control" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                    </div>

                    <div class="mt-4 row">
                        <x-label class="col-sm-4" for="password" :value="__('パスワード')" />
                        <div class="col-sm-8">
                            <x-input id="password" class="block mt-1 form-control"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                        </div>
                    </div>

                    <div class="block mt-4 row">
                        <label for="remember_me" class="inline-flex items-center pl-2">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('ログイン保持') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('パスワードを忘れた方') }}
                            </a>
                        @endif
                        <div class="text-center">
                            <button class=" btn btn-outline-info">
                                {{ __('ログイン') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

</x-app-layout>
