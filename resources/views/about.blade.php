@extends('layouts.app', ['active' => 'about'])

@section('title', 'About')

@section('content')
<section class="hero hero--compact">
    <div class="wrap">
        <h1 class="headline-xl" data-reveal>About.</h1>
        <p class="lede" data-reveal style="--delay: .08s">
            Tasks for Today is a small internal tool for tracking a team&rsquo;s daily to-do items.
            The Today page filters tasks by the current date, while the Task List shows everything.
        </p>
    </div>
</section>

<section class="section section--alt section--tight">
    <div class="wrap wrap--narrow">
        <h2 class="group-heading" data-reveal>Developer</h2>
        <dl class="group" data-reveal>
            <div class="group-row"><dt>Developed by</dt><dd>{{ $developer['name'] }}</dd></div>
            <div class="group-row"><dt>Program</dt><dd>{{ $developer['program'] }}</dd></div>
            <div class="group-row"><dt>Course</dt><dd>{{ $developer['course'] }}</dd></div>
            <div class="group-row"><dt>Assessment</dt><dd>{{ $developer['assessment'] }}</dd></div>
            <div class="group-row"><dt>Section</dt><dd>{{ $developer['section'] }}</dd></div>
            <div class="group-row"><dt>Professor</dt><dd>{{ $developer['professor'] }}</dd></div>
            <div class="group-row"><dt>Email</dt><dd>{{ $developer['email'] }}</dd></div>
            <div class="group-row"><dt>Repository</dt><dd><a href="{{ $developer['github'] }}">{{ $developer['github'] }}</a></dd></div>
        </dl>

        <h2 class="group-heading" data-reveal>How it is built</h2>
        <dl class="group" data-reveal>
            <div class="group-row"><dt>Framework</dt><dd>Laravel {{ app()->version() }}, MVC</dd></div>
            <div class="group-row"><dt>Models</dt><dd>Task, User (Eloquent)</dd></div>
            <div class="group-row"><dt>Controllers</dt><dd>Home, Task, Profile, Page</dd></div>
            <div class="group-row"><dt>Views</dt><dd>Blade layout and a shared task row</dd></div>
            <div class="group-row"><dt>Database</dt><dd>MySQL, built with migrations and a seeder</dd></div>
        </dl>
        <p class="note" data-reveal>This page is static and makes no database queries.</p>
    </div>
</section>
@endsection
