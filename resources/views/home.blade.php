@extends('layouts.app', ['active' => 'home'])

@section('title', 'Welcome')

@section('content')
@php
    $total = $tasks->count();
    $done = $counts['done'];
    $progress = $total > 0 ? round($done / $total, 4) : 0;
@endphp
<section class="hero">
    <div class="wrap">
        <p class="eyebrow" data-reveal>{{ $today->format('l, F j') }}</p>
        <h1 class="headline-xl" data-reveal style="--delay: .08s">Today.</h1>
        <p class="lede" data-reveal style="--delay: .16s">
            @if ($total === 0)
                Nothing is scheduled for today.
            @else
                {{ $total }} {{ Str::plural('task', $total) }} on the list for today.
            @endif
        </p>

        <div class="ring" data-reveal style="--delay: .24s; --progress: {{ $progress }}"
             role="img" aria-label="{{ $done }} of {{ $total }} tasks done">
            <svg class="ring-svg" viewBox="0 0 120 120" aria-hidden="true">
                <defs>
                    <linearGradient id="ringGradient" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0" stop-color="#34c759"/>
                        <stop offset="1" stop-color="#00c7be"/>
                    </linearGradient>
                </defs>
                <circle class="ring-track" cx="60" cy="60" r="52"/>
                <circle class="ring-fill" cx="60" cy="60" r="52" stroke="url(#ringGradient)"/>
            </svg>
            <div class="ring-label">
                <span class="ring-number">{{ $done }}</span>
                <span class="ring-caption">of {{ $total }} done</span>
            </div>
        </div>

        <dl class="stats" data-reveal style="--delay: .32s">
            <div class="stat"><dt>Done</dt><dd>{{ $counts['done'] }}</dd></div>
            <div class="stat"><dt>In progress</dt><dd>{{ $counts['in-progress'] }}</dd></div>
            <div class="stat"><dt>Pending</dt><dd>{{ $counts['pending'] }}</dd></div>
        </dl>
    </div>
</section>

<section class="section section--alt">
    <div class="wrap">
        <h2 class="headline-l" data-reveal>Today&rsquo;s tasks.</h2>
        @if ($total === 0)
            <p class="empty" data-reveal>No tasks are dated {{ $today->toDateString() }}. Check the full list for other days.</p>
        @else
            <ul class="task-list" data-reveal>
                @foreach ($tasks as $task)
                    @include('partials.task-row', ['task' => $task])
                @endforeach
            </ul>
            <p class="note" data-reveal>Only tasks dated {{ $today->toDateString() }} appear here.</p>
        @endif
        <p class="section-link" data-reveal><a class="more" href="{{ route('tasks.index') }}">See all tasks</a></p>
    </div>
</section>
@endsection
