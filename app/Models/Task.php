<?php

namespace App\Models;

use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<TaskFactory> */
    use HasFactory;

    /** Allowed values for the status column, with their display labels. */
    public const STATUSES = [
        'pending' => 'Pending',
        'in-progress' => 'In progress',
        'done' => 'Done',
    ];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'status',
        'task_date',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'task_date' => 'date',
        ];
    }

    /**
     * Only tasks scheduled on the given date.
     */
    public function scopeDueOn(Builder $query, $date): void
    {
        $query->whereDate('task_date', $date);
    }

    /**
     * Oldest date first, then in the order the tasks were added.
     */
    public function scopeOrdered(Builder $query): void
    {
        $query->orderBy('task_date')->orderBy('id');
    }

    /**
     * Display label for the task's status.
     */
    public function statusLabel(): string
    {
        return self::STATUSES[$this->status] ?? ucfirst($this->status);
    }
}
