<x-app-layout>

            <div class="card mt-4 mx-auto" style="width:30rem;">
                <div class="card-header">{{__('パスワード変更')}}</div>

                <div class="card-body">
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('password.change') }}">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}

                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                            <label for="current_password" class="col-md-4 control-label">{{ __('現在のパスワード') }}</label>

                            <div class="col-md-6">
                                <input id="current_password" type="password" class="form-control" name="current_password" required>

                                @if ($errors->has('current_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                            <label for="new_password" class="col-md-4 control-label">{{ __('新しいパスワード') }}</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" required>

                                @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                            <label for="new_password-confirm" class="col-md-4 control-label">{{ __('確認用パスワード') }}</label>
                            <div class="col-md-6">
                                <input id="new_password-confirm" type="password" class="form-control" name="new_password_confirmation" required>

                                @if ($errors->has('new_password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class=" text-center">
                                <button type="submit" class="btn btn-outline-info">
                                    {{ __('変更') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</x-app-layout>
