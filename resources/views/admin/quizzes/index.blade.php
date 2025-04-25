@extends('layouts.admin')

@section('title', 'Manage Quizzes')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Manage Quizzes</h1>
        <a href="{{ route('admin.quizzes.create') }}" class="btn btn-primary">Create New Quiz</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success mb-6">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="card">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="table-header">
                    <tr>
                        <th class="table-cell">Title</th>
                        <th class="table-cell">Category</th>
                        <th class="table-cell">Difficulty</th>
                        <th class="table-cell">Questions</th>
                        <th class="table-cell">Status</th>
                        <th class="table-cell">Created</th>
                        <th class="table-cell">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($quizzes as $quiz)
                        <tr class="table-row">
                            <td class="table-cell font-medium">{{ $quiz->title }}</td>
                            <td class="table-cell">{{ $quiz->category }}</td>
                            <td class="table-cell">
                                <div class="flex">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $quiz->difficulty)
                                            <span class="text-yellow-500">★</span>
                                        @else
                                            <span class="text-gray-300">★</span>
                                        @endif
                                    @endfor
                                </div>
                            </td>
                            <td class="table-cell">{{ $quiz->questions->count() }}</td>
                            <td class="table-cell">
                                <span class="badge {{ $quiz->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} rounded-full px-3 py-1">
                                    {{ $quiz->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="table-cell">{{ $quiz->created_at->format('M d, Y') }}</td>
                            <td class="table-cell">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.quizzes.edit', $quiz) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    <a href="{{ route('admin.quizzes.scores', $quiz) }}" class="btn btn-secondary btn-sm">Scores</a>
                                    <form action="{{ route('admin.quizzes.destroy', $quiz) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this quiz?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-secondary btn-sm bg-red-500 hover:bg-red-600 text-white">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="table-cell text-center py-4 text-gray-500">No quizzes found. Create a new one to get started!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
