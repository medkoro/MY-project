@extends('layouts.app')

@section('content')
<div style="max-width: 400px; margin: 50px auto; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); background-color: #f9f9f9;">
    <h2 style="text-align: center; font-family: 'Comic Sans MS', cursive; color: #4CAF50;">Nouveau mot de passe</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div style="margin-bottom: 15px;">
            <label for="email" style="font-weight: bold;">Adresse Email</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus 
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            @error('email')
                <span style="color: #dc3545; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password" style="font-weight: bold;">Nouveau mot de passe</label>
            <input id="password" type="password" name="password" required 
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            @error('password')
                <span style="color: #dc3545; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password_confirmation" style="font-weight: bold;">Confirmer le mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required 
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>

        <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">
            Réinitialiser le mot de passe
        </button>
    </form>
</div>
@endsection 