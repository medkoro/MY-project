@extends('layouts.admin')

@section('title', "Table: {$tableName}")

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Table: {{ $tableName }}</h1>
        <div>
            <a href="{{ route('admin.database.create', $tableName) }}" class="btn btn-primary mr-2">Add New Record</a>
            <a href="{{ route('admin.database.index') }}" class="btn btn-secondary">Back to Tables</a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            @foreach($columns as $column)
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ $column }}
                                </th>
                            @endforeach
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($records as $record)
                            <tr>
                                @foreach($columns as $column)
                                    <td class="px-4 py-3 whitespace-nowrap text-sm">
                                        @if(is_object($record->$column) || is_array($record->$column))
                                            <code>{{ json_encode($record->$column) }}</code>
                                        @elseif(is_null($record->$column))
                                            <span class="text-gray-400">NULL</span>
                                        @elseif(strlen($record->$column) > 100)
                                            {{ substr($record->$column, 0, 100) }}...
                                        @else
                                            {{ $record->$column }}
                                        @endif
                                    </td>
                                @endforeach
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-right">
                                    @if($primaryKey && isset($record->$primaryKey))
                                        <a href="{{ route('admin.database.edit', [$tableName, $record->$primaryKey]) }}" class="text-blue-600 hover:text-blue-900 mr-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.database.delete', [$tableName, $record->$primaryKey]) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this record?')">
                                                Delete
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400">No PK</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $records->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
