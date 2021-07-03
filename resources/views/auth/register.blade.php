<x-app-layout>
        <div class="card mt-4 mx-auto" style="width:30rem;">
            <div class="card-header">{{__('新規登録') }}</div>
            <div class="card-body">
               <x-auth-validation-errors class="mb-4 alert alert-danger text-center" :errors="$errors" />
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row form-group">
                        <x-label class="col-sm-4" for="name" :value="__('名前')" />
                        <div class="col-sm-8">
                            <x-input id="name" class="block mt-1 form-control" type="text" name="name" :value="old('name')" required autofocus />
                        </div>
                    </div>

                    <div class="mt-4 row">
                        <x-label class="col-sm-4" for="email" :value="__('メールアドレス')" />
                        <div class="col-sm-8">
                            <x-input id="email" class="block mt-1 form-control" type="email" name="email" :value="old('email')" required />
                        </div>
                    </div>

                    <div class="mt-4 row">
                        <x-label class="col-sm-4" for="password" :value="__('パスワード')" />
                        <div class="col-sm-8">
                            <x-input id="password" class="block mt-1 form-control"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                        </div>
                    </div>

                    <div class="mt-4 row">
                        <x-label class="col-sm-4" for="password_confirmation" :value="__('パスワード（確認用）')" />
                        <div class="col-sm-8">
                            <x-input id="password_confirmation" class="block mt-1 form-control"
                                            type="password"
                                            name="password_confirmation" required />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 ml-1" href="{{ route('login') }}">
                            {{ __('既に登録済の方') }}
                        </a>
                        <button class="ml-5 btn btn-outline-info">
                            {{ __('新規登録') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

</x-app-layout>
