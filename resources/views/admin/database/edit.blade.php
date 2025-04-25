@extends('layouts.admin')

@section('title', "Edit Record | {$tableName}")

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Edit Record in {{ $tableName }}</h1>
        <a href="{{ route('admin.database.table', $tableName) }}" class="btn btn-secondary">Back to Table</a>
    </div>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.database.update', [$tableName, $id]) }}" method="POST">
                @csrf
                @method('PUT')
                
                @foreach($columns as $column)
                    <div class="mb-4">
                        <label for="{{ $column }}" class="form-label">{{ $column }}</label>
                        
                        @if($column == $primaryKey)
                            <input type="text" id="{{ $column }}" name="{{ $column }}" value="{{ $record->$column }}" class="input bg-gray-100" readonly>
                            <p class="text-sm text-gray-500">Primary key cannot be edited</p>
                        @elseif(strpos($columnTypes[$column], 'text') !== false)
                            <textarea id="{{ $column }}" name="{{ $column }}" class="input" rows="3">{{ $record->$column }}</textarea>
                        @elseif(strpos($columnTypes[$column], 'tinyint(1)') !== false)
                            <select id="{{ $column }}" name="{{ $column }}" class="input">
                                <option value="1" {{ $record->$column == 1 ? 'selected' : '' }}>True (1)</option>
                                <option value="0" {{ $record->$column == 0 ? 'selected' : '' }}>False (0)</option>
                            </select>
                        @elseif(strpos($columnTypes[$column], 'date') !== false)
                            <input type="date" id="{{ $column }}" name="{{ $column }}" value="{{ $record->$column }}" class="input">
                        @elseif(strpos($columnTypes[$column], 'timestamp') !== false || strpos($columnTypes[$column], 'datetime') !== false)
                            <input type="datetime-local" id="{{ $column }}" name="{{ $column }}" 
                                value="{{ \Carbon\Carbon::parse($record->$column)->format('Y-m-d\TH:i') }}" 
                                class="input">
                        @else
                            <input type="text" id="{{ $column }}" name="{{ $column }}" value="{{ $record->$column }}" class="input">
                        @endif
                    </div>
                @endforeach
                
                <div class="flex justify-end mt-6">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
