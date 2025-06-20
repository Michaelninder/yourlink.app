@extends('layouts.dashboard')

@section('dashboard')
<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Your Links</h2>
    <p class="text-gray-600">You have {{ $links_count }} links with {{ $views_count }} views.</p>
</div>

@if ($links->count())
    <div class="grid gap-4">
        @foreach ($links as $link)
            <div class="bg-white shadow rounded-xl p-4 flex justify-between items-center">
                <div>
                    <p class="font-semibold text-gray-800">{{ $link->title ?? $link->short_code }}</p>
                    <p class="text-gray-500 text-sm">/{{ $link->short_code }}</p>
                </div>
                <div class="text-sm text-gray-600">
                    <span class="font-medium">{{ $link->views->count() }}</span> views
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $links->links() }}
    </div>
@else
    <p class="text-gray-500">No links created yet.</p>
@endif
@endsection
