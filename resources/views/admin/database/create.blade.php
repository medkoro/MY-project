@extends('layouts.admin')

@section('title', "Create Record | {$tableName}")

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Add New Record to {{ $tableName }}</h1>
        <a href="{{ route('admin.database.table', $tableName) }}" class="btn btn-secondary">Back to Table</a>
    </div>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.database.store', $tableName) }}" method="POST">
                @csrf
                
                @foreach($columns as $column)
                    <div class="mb-4">
                        <label for="{{ $column }}" class="form-label">{{ $column }}</label>
                        
                        @if(strpos($columnTypes[$column], 'text') !== false)
                            <textarea id="{{ $column }}" name="{{ $column }}" class="input" rows="3">{{ old($column) }}</textarea>
                        @elseif(strpos($columnTypes[$column], 'tinyint(1)') !== false)
                            <select id="{{ $column }}" name="{{ $column }}" class="input">
                                <option value="">-- Select --</option>
                                <option value="1" {{ old($column) == '1' ? 'selected' : '' }}>True (1)</option>
                                <option value="0" {{ old($column) == '0' ? 'selected' : '' }}>False (0)</option>
                            </select>
                        @elseif(strpos($columnTypes[$column], 'date') !== false)
                            <input type="date" id="{{ $column }}" name="{{ $column }}" value="{{ old($column) }}" class="input">
                        @elseif(strpos($columnTypes[$column], 'timestamp') !== false || strpos($columnTypes[$column], 'datetime') !== false)
                            <input type="datetime-local" id="{{ $column }}" name="{{ $column }}" value="{{ old($column) }}" class="input">
                        @else
                            <input type="text" id="{{ $column }}" name="{{ $column }}" value="{{ old($column) }}" class="input">
                        @endif
                        
                        <p class="text-sm text-gray-500 mt-1">Type: {{ $columnTypes[$column] }}</p>
                    </div>
                @endforeach
                
                <div class="flex justify-end mt-6">
                    <button type="submit" class="btn btn-primary">Create Record</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
