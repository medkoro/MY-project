@extends('layouts.app')

@section('content')
<div style="max-width: 400px; margin: 50px auto; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); background-color: #f9f9f9;">
    <h2 style="text-align: center; font-family: 'Comic Sans MS', cursive; color: #4CAF50;">Réinitialiser le mot de passe</h2>
    
    @if (session('status'))
        <div style="margin-bottom: 15px; padding: 10px; background-color: #d4edda; border-radius: 5px; color: #155724;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="email" style="font-weight: bold;">Adresse Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            
            @error('email')
                <span style="color: #dc3545; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">
            Envoyer le lien de réinitialisation
        </button>

        <div style="margin-top: 15px; text-align: center;">
            <a href="{{ route('login') }}" style="color: #4CAF50; text-decoration: none;">Retour à la connexion</a>
        </div>
    </form>
</div>
@endsection 