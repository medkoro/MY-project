<!-- filepath: /c:/Users/T470s/kids-learning-site/resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
    <div style="max-width: 400px; margin: 50px auto; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); background-color: #f9f9f9;">
        <h2 style="text-align: center; font-family: 'Comic Sans MS', cursive; color: #4CAF50;">Connexion</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="email" style="font-weight: bold;">Adresse Email</label>
                <input id="email" type="email" name="email" required autofocus style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="password" style="font-weight: bold;">Mot de Passe</label>
                <input id="password" type="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px; text-align: left;">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Se souvenir de moi</label>
            </div>
            <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">
                Connexion
            </button>
            <div style="margin-top: 15px; text-align: center;">
                <a href="{{ route('password.request') }}" style="color: #4CAF50; text-decoration: none;">Mot de passe oublié ?</a>
            </div>
        </form>
    </div>
@endsection