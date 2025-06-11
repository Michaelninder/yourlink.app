@extends('layouts.app')

@section('title', 'Your Short Link')

@section('content')
    <div class="bg-white p-6 rounded shadow max-w-lg mx-auto">
        <h2 class="text-xl font-semibold mb-4">Your Short Link is Ready</h2>

        <p><strong>Original URL:</strong><br>
            <a href="{{ $link->original_url }}" class="text-blue-600 underline break-words" target="_blank">{{ $link->original_url }}</a>
        </p>

        <p class="mt-4"><strong>Short Link:</strong><br>
            <a href="{{ url('/' . $link->short_code) }}" class="text-blue-600 underline" target="_blank">{{ url('/' . $link->short_code) }}</a>
        </p>

        <div class="mt-6">
            <p class="font-medium mb-2">QR Code:</p>
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode(url('/' . $link->short_code)) }}" alt="QR Code">
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('links.create') }}" class="text-sm text-blue-500 hover:underline">Create another link</a>
        </div>
    </div>
@endsection
