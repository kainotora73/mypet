<x-app-layout>
    <div class="card mt-4 mx-auto  w-75">
        <div class="card-header">{{__('ペット登録') }}</div>
        <div class="card-body">
            <form method="post" action="{{ route('store') }}">
                @csrf
                {{-- name --}}
                <div class="row form-group">
                    <x-label class="col-sm-4" for="name" :value="__('名前')" />
                    <div>
                        <input class="block mt-1 form-control" type="text" name="name" value="{{ old('name') }}" autofocus>
                    </div>
                </div>
                @error('name')
                <div class="mb-4 alert alert-danger text-center">
                    <div class="error">{{ $message }}</div>
                </div>
                @enderror
                {{-- type --}}
                <div class="mt-4 row">
                    <x-label class="col-sm-4" :value="__('タイプ')" />
                    <div>
                        <select class="mr-5 pr-5 btn btn-outline-info" role="button" name="body">
                            @foreach ($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="text-center">
                    <button class="mt-5 btn btn-outline-info">{{ __('追加') }}</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
