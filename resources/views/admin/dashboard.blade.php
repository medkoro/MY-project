@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Welcome, Admin {{ Auth::user()->name }}!</h3>
                    
                    <div class="mt-4">
                        <h4>Admin Actions</h4>
                        <div class="list-group">
                            <a href="{{ route('admin.content.index') }}" class="list-group-item list-group-item-action">
                                Manage Content
                            </a>
                            <a href="{{ route('admin.categories.create') }}" class="list-group-item list-group-item-action">
                                Create Category
                            </a>
                            <a href="{{ route('admin.content.create') }}" class="list-group-item list-group-item-action">
                                Create Content
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 