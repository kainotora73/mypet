@extends('layouts.app')

@section('content')

    <div class="top">
        <h1>{{ __('NEW PET') }}</h1>
        <form method="post" action="{{ route('store') }}">
            @csrf
            <label>
                {{ __('Name') }}
                <input type="text" name="name" value="{{ old('name') }}" autofocus>
            </label>
            <h1>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </h1>
            <label>
                {{ __('Type') }}
                <select name="body">
                    @foreach ($types as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>

            </label>
            <button>{{ __('Add') }}</button>
        </form>
    </div>
@endsection
