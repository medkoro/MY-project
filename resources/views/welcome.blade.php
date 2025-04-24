<!-- filepath: /c:/Users/T470s/kids-learning-site/resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
    <div style="text-align: center; padding: 40px; background-color: #f9f9f9;">
        <h1 style="font-family: 'Comic Sans MS', cursive, sans-serif; color: #FF5733; font-size: 50px; margin-bottom: 20px;">
            Bienvenue sur KidsLearning 🎓
        </h1>
        <p style="font-size: 20px; color: #555; margin-bottom: 40px;">
            Une plateforme amusante et éducative pour apprendre les couleurs, les nombres, les animaux et bien plus encore !
        </p>

        <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 30px;">
            <!-- Section Couleurs -->
            <div style="width: 250px; text-align: center; border: 2px solid #FF5733; border-radius: 15px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); background-color: #FFF5F3;">
                <h2 style="font-family: 'Comic Sans MS', cursive; color: #FF5733;">Couleurs 🎨</h2>
                <p style="color: #555;">Apprenez les couleurs de manière amusante.</p>
                <a href="{{ route('colors.index') }}" style="text-decoration: none; background-color: #FF5733; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold; transition: background-color 0.3s;">
                    Explorer
                </a>
            </div>

            <!-- Section Nombres -->
            <div style="width: 250px; text-align: center; border: 2px solid #4CAF50; border-radius: 15px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); background-color: #F3FFF3;">
                <h2 style="font-family: 'Comic Sans MS', cursive; color: #4CAF50;">Nombres 🔢</h2>
                <p style="color: #555;">Apprenez les nombres avec des sons interactifs.</p>
                <a href="{{ route('numbers.index') }}" style="text-decoration: none; background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold; transition: background-color 0.3s;">
                    Explorer
                </a>
            </div>

            <!-- Section Animaux -->
            <div style="width: 250px; text-align: center; border: 2px solid #2196F3; border-radius: 15px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); background-color: #F3F9FF;">
                <h2 style="font-family: 'Comic Sans MS', cursive; color: #2196F3;">Animaux 🐾</h2>
                <p style="color: #555;">Découvrez les sons des animaux.</p>
                <a href="{{ route('animals.index') }}" style="text-decoration: none; background-color: #2196F3; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold; transition: background-color 0.3s;">
                    Explorer
                </a>
            </div>
        </div>
    </div>
@endsection 