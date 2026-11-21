@php
    $links = [
        'home' => ['route' => 'home', 'label' => 'Today'],
        'tasks' => ['route' => 'tasks.index', 'label' => 'Task List'],
        'profile' => ['route' => 'profile', 'label' => 'Profile'],
        'about' => ['route' => 'about', 'label' => 'About'],
    ];
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#fbfbfd">
    <title>@yield('title', 'Tasks for Today') | Tasks for Today</title>
    <script>
        document.documentElement.classList.add('js');
        setTimeout(function () {
            if (!window.appReady) document.documentElement.classList.remove('js');
        }, 2500);
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>

<header class="globalnav" data-globalnav>
    <nav class="globalnav-content" aria-label="Main">
        <a class="globalnav-brand" href="{{ route('home') }}">Tasks for Today</a>

        <button class="globalnav-toggle" type="button" aria-controls="globalnav-menu"
                aria-expanded="false" aria-label="Open menu" data-globalnav-toggle>
            <span class="globalnav-toggle-bar"></span>
            <span class="globalnav-toggle-bar"></span>
        </button>

        <div class="globalnav-menu" id="globalnav-menu">
            <ul class="globalnav-list">
                @foreach ($links as $key => $link)
                    <li class="globalnav-item" style="--i: {{ $loop->index }}">
                        <a class="globalnav-link" href="{{ route($link['route']) }}"
                           @if (($active ?? '') === $key) aria-current="page" @endif>{{ $link['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>

<main id="main">
    @yield('content')
</main>

<footer class="footer">
    <div class="wrap">
        <p>Tasks for Today Management System, built with Laravel {{ app()->version() }} for IT0049 Web System Technologies.</p>
        <p>Technical Summative Assessment 3</p>
    </div>
</footer>
</body>
</html>
