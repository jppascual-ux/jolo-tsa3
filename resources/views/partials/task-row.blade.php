{{-- One task row, shared by the Welcome page and the Task List page. --}}
<li class="task task--{{ $task->status }}">
    <span class="task-check" aria-hidden="true"></span>
    <div class="task-body">
        <p class="task-title">{{ $task->title }}</p>
        <p class="task-status">{{ $task->statusLabel() }}</p>
    </div>
</li>
