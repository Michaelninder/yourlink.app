@extends('layouts.dashboard')

@section('dashboard')
<h1 class="text-2xl font-bold mb-6">Your Links</h1>

@if ($links->count())
    <div class="grid grid-cols-1 gap-6">
        @foreach ($links as $link)
            <div class="bg-white shadow rounded-lg p-4 flex flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    <p class="font-semibold text-gray-800">{{ $link->short_code }}</p>
                    <p class="text-gray-600 text-sm break-all">{{ $link->original_url }}</p>
                    <p class="text-sm text-gray-400">Views: {{ $link->views_count }}</p>
                </div>
                <div class="flex space-x-2 mt-4 md:mt-0">
                    <a href="{{ route('links.edit', $link->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    <button onclick="copyToClipboard('{{ url($link->short_code) }}')" class="text-green-600 hover:underline">Copy</button>
                    <form action="{{ route('links.destroy', $link->id) }}" method="POST" onsubmit="return confirm('Delete this link?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $links->links() }}
    </div>
@else
    <p class="text-gray-600">You haven’t created any links yet.</p>
@endif

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('Link copied to clipboard!');
    });
}
</script>
@endsection
