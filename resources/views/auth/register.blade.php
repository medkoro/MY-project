<!-- filepath: /c:/Users/T470s/kids-learning-site/resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')
    <div style="max-width: 400px; margin: 50px auto; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); background-color: #f9f9f9;">
        <h2 style="text-align: center; font-family: 'Comic Sans MS', cursive; color: #FF5733;">Inscription</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="name" style="font-weight: bold;">Nom</label>
                <input id="name" type="text" name="name" required autofocus style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="email" style="font-weight: bold;">Adresse Email</label>
                <input id="email" type="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="password" style="font-weight: bold;">Mot de Passe</label>
                <input id="password" type="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="password-confirm" style="font-weight: bold;">Confirmer le Mot de Passe</label>
                <input id="password-confirm" type="password" name="password_confirmation" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <button type="submit" style="width: 100%; padding: 10px; background-color: #FF5733; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">
                S'inscrire
            </button>
        </form>
    </div>
@endsection