@extends('layouts.app')

@section('title', 'Create Link')

@section('content')
<div class="mx-auto w-full max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Create a Short Link</h1>

    <form method="POST" action="{{ route('links.store') }}" class="space-y-6 bg-white p-6 rounded shadow">
        @csrf

        {{-- Original URL --}}
        <div>
            <label for="original_url" class="block font-medium mb-1">Original URL</label>
            <input type="url" name="original_url" id="original_url"
                   required
                   class="w-full border rounded px-3 py-2"
                   placeholder="https://example.com"
                   value="{{ old('original_url') }}">
            @error('original_url')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- UUID Type Select --}}
        <div class="relative">
            <label for="uuid_type" class="block font-medium mb-1">Link Format</label>
            <select name="uuid_type" id="uuid_type"
                    class="w-full border rounded px-3 py-2 bg-white {{ auth()->check() ? '' : 'pointer-events-none opacity-50' }}"
                    {{ auth()->check() ? '' : 'disabled' }}>
                <option value="uuid" {{ old('uuid_type') === 'uuid' ? 'selected' : '' }}>
                    Long UUID (e.g., a17f5cb9-92a0-4e99-bc73-016219b470be)
                </option>
                <option value="short" {{ old('uuid_type') === 'short' ? 'selected' : '' }}>
                    Short UUID (e.g., x7Yc9Kp)
                </option>
            </select>

            @guest
                <div class="absolute top-0 right-0 mt-1 mr-1">
                    <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded"
                          title="Login to choose short UUIDs">Login required</span>
                </div>
            @endguest

            @error('uuid_type')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Premium: Custom Slug --}}
        <div class="relative">
            <label for="custom_code" class="block font-medium mb-1">
                Custom Slug <span class="ml-1 text-sm text-gray-500">(Premium)</span>
            </label>
            <input type="text"
                   name="custom_code"
                   id="custom_code"
                   placeholder="e.g. custom-name"
                   class="w-full border rounded px-3 py-2 bg-gray-100 {{ auth()->check() && auth()->user()->plan === 'premium' ? '' : 'pointer-events-none opacity-50' }}"
                   {{ auth()->check() && auth()->user()->plan === 'premium' ? '' : 'disabled' }}>

            <div class="absolute top-0 right-0 mt-1 mr-1">
                @guest
                    <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded"
                          title="Login for more options">Login required</span>
                @else
                    @if(auth()->user()->plan !== 'premium')
                        <span class="text-xs bg-gray-200 text-gray-600 px-2 py-1 rounded"
                              title="Upgrade to Premium to set custom slugs">Upgrade to Premium</span>
                    @endif
                @endguest
            </div>

            @error('custom_code')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Submit --}}
        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                Shorten
            </button>
        </div>
    </form>
</div>
@endsection
