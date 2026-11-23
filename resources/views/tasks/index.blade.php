@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Your Tasks</h1>
            <p class="text-sm text-slate-500">{{ $tasks->count() }} total</p>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 divide-y divide-slate-100 shadow-sm">
        @forelse ($tasks as $task)
            <div class="p-4 flex items-start justify-between gap-4">
                <div class="space-y-1">
                    <div class="flex items-center gap-2 flex-wrap">
                        <span class="font-medium {{ $task->is_completed ? 'line-through text-slate-400' : 'text-slate-900' }}">
                            {{ $task->title }}
                        </span>

                        @if ($task->is_completed)
                            <span class="text-xs font-medium bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded-full">
                                Completed
                            </span>
                        @else
                            <span class="text-xs font-medium bg-amber-100 text-amber-800 px-2 py-0.5 rounded-full">
                                Pending
                            </span>
                        @endif

                        @if ($task->due_date)
                            <span class="text-xs text-slate-500 bg-slate-100 px-2 py-0.5 rounded-full">
                                Due {{ \Illuminate\Support\Carbon::parse($task->due_date)->format('M d, Y') }}
                            </span>
                        @endif
                    </div>

                    @if ($task->description)
                        <p class="text-sm text-slate-600">{{ $task->description }}</p>
                    @endif
                </div>

                <div class="flex items-center gap-2 shrink-0">
                    <a href="{{ route('tasks.edit', $task) }}"
                       class="text-sm font-medium text-slate-700 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 px-3 py-1.5 rounded-lg transition">
                        Edit
                    </a>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                          onsubmit="return confirm('Delete this task?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-sm font-medium text-rose-600 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 px-3 py-1.5 rounded-lg transition">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="p-10 text-center">
                <p class="text-slate-600 font-medium mb-1">No tasks yet</p>
                <p class="text-sm text-slate-400 mb-4">Create your first task to get started.</p>
                <a href="{{ route('tasks.create') }}"
                   class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                    Create Task
                </a>
            </div>
        @endforelse
    </div>
@endsection
