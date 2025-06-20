@extends('layouts.app')

@section('title', __('legal.' . $section . '.title'))

@section('content')
<div class="max-w-3xl mx-auto py-12 px-6 text-gray-800 leading-relaxed space-y-6 markdown">
    {!! Illuminate\Support\Str::markdown(__('legal.' . $section . '.content')) !!}
</div>

<div class="max-w-3xl mx-auto mt-8 px-6 space-x-4 text-sm">
    @foreach (['privacy', 'terms', 'imprint'] as $item)
        <a href="{{ route('legal.show', ['section' => $item]) }}"
           class="{{ $section === $item ? 'font-semibold text-blue-700 underline' : 'text-blue-600 underline hover:text-blue-800' }}">
           {{ __('legal.' . $item . '.title') }}
        </a>
        @if (!$loop->last)<span class="text-gray-400">|</span>@endif
    @endforeach
</div>

<style>
.markdown h1 { font-size: 2.25rem; font-weight: 700; margin-top: 2rem; margin-bottom: 1rem; color: #1f2937; }
.markdown h2 { font-size: 1.875rem; font-weight: 600; margin-top: 2rem; margin-bottom: 1rem; color: #374151; }
.markdown h3 { font-size: 1.5rem; font-weight: 600; margin-top: 1.5rem; margin-bottom: 1rem; color: #4b5563; }
.markdown p  { font-size: 1rem; margin-bottom: 1rem; color: #4b5563; }
.markdown ul, .markdown ol { margin-bottom: 1rem; padding-left: 1.5rem; color: #4b5563; }
.markdown a   { color: #2563eb; text-decoration: underline; }
.markdown strong { font-weight: 600; color: #1f2937; }
.markdown blockquote {
  border-left: 4px solid #d1d5db;
  padding-left: 1rem;
  font-style: italic;
  color: #6b7280;
  margin: 1rem 0;
}
.markdown hr {
  border-top: 1px solid #d1d5db;
  margin: 2rem 0;
}
</style>
@endsection
