<x-app-layout>

        <div class="card mt-4 mx-auto" style="width:30rem;">
            <div class="card-header">{{__('パスワードリセット') }}</div>
            <div class="card-body">
                <x-auth-validation-errors class="mb-4 alert alert-danger text-center" :errors="$errors" />

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="row form-group">
                        <x-label class="col-sm-4" for="email" :value="__('Email')" />
                        <div class="col-sm-8">
                            <x-input id="email" class="block mt-1 form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                        </div>
                    </div>

                    <div class="mt-4 row">
                        <x-label class="col-sm-4" for="password" :value="__('パスワード')" />
                        <div class="col-sm-8">
                            <x-input id="password" class="block mt-1 form-control" type="password" name="password" required />
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

                    <div class="flex text-center justify-end mt-4">
                        <button class="ml-5 btn btn-outline-info">
                            {{ __('パスワード再登録') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
