@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-900">Edit Task</h1>
            <p class="text-sm text-slate-500 mt-1">Update task details or mark it as completed.</p>
        </div>

        <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-1">
                    Title <span class="text-rose-600">*</span>
                </label>
                <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}" required
                       class="w-full rounded-lg border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:border-indigo-500 focus:outline-none">
                @error('title')
                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-1">
                    Description
                </label>
                <textarea id="description" name="description" rows="4"
                          class="w-full rounded-lg border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:border-indigo-500 focus:outline-none">{{ old('description', $task->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="due_date" class="block text-sm font-medium text-slate-700 mb-1">
                    Due Date
                </label>
                <input type="date" id="due_date" name="due_date"
                       value="{{ old('due_date', $task->due_date ? \Illuminate\Support\Carbon::parse($task->due_date)->format('Y-m-d') : '') }}"
                       class="rounded-lg border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:border-indigo-500 focus:outline-none">
                @error('due_date')
                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-2">
                <input type="hidden" name="is_completed" value="0">
                <input type="checkbox" id="is_completed" name="is_completed" value="1"
                       {{ old('is_completed', $task->is_completed) ? 'checked' : '' }}
                       class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                <label for="is_completed" class="text-sm font-medium text-slate-700">
                    Mark as completed
                </label>
            </div>

            <div class="pt-2 flex items-center gap-3">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-5 py-2.5 rounded-lg transition">
                    Update Task
                </button>
                <a href="{{ route('tasks.index') }}"
                   class="text-sm font-medium text-slate-600 hover:text-slate-900 px-3 py-2">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
