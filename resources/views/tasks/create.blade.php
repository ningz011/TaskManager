@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-900">Create Task</h1>
            <p class="text-sm text-slate-500 mt-1">Add a new task with an optional due date and notes.</p>
        </div>

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-1">
                    Title <span class="text-rose-600">*</span>
                </label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" autofocus required
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
                          class="w-full rounded-lg border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:border-indigo-500 focus:outline-none">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="due_date" class="block text-sm font-medium text-slate-700 mb-1">
                    Due Date
                </label>
                <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}"
                       class="rounded-lg border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:border-indigo-500 focus:outline-none">
                @error('due_date')
                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-2 flex items-center gap-3">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-5 py-2.5 rounded-lg transition">
                    Save Task
                </button>
                <a href="{{ route('tasks.index') }}"
                   class="text-sm font-medium text-slate-600 hover:text-slate-900 px-3 py-2">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
