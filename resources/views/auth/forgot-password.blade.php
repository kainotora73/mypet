<x-app-layout>

        <div style="width:20rem" class="border border-warning mt-4 mb-4 text-center text-sm text-gray-600 mx-auto text-jastify">
            {{ __('パスワードをお忘れですか？メールアドレスをお知らせいただければ、新しいパスワードを選択できるパスワードリセットリンクをメールでお送りします。') }}
        </div>

        <div class="card mt-4 mx-auto" style="width:30rem">
            <div class="card-header">{{__('パスワード再設定フォーム') }}</div>
            <div class="card-body">

                <x-auth-session-status class="mb-4 alert alert-success text-center" :status="session('status')" />
                <x-auth-validation-errors class="mb-4 alert alert-danger text-center" :errors="$errors" />


                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="row form-group">
                        <x-label class="col-sm-4" for="email" :value="__('メールアドレス')" />
                        <div class="col-sm-8">
                            <x-input id="email" class="block mt-1 form-control" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button class=" ml-5 btn btn-outline-info">
                            {{ __('メールを送信する') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
