@extends('layouts.app')

@section('content')
<div class="game-container">
    <!-- Memory Game -->
    <div class="game-section">
        <h2>Memory Game</h2>
        <p>Match the pairs of emojis!</p>
        <div class="memory-game"></div>
    </div>

    <!-- Math Game -->
    <div class="game-section">
        <h2>Math Game</h2>
        <p>Solve the math problems!</p>
        <div class="math-game"></div>
    </div>

    <!-- Word Game -->
    <div class="game-section">
        <h2>Word Scramble</h2>
        <p>Unscramble the words!</p>
        <div class="word-game"></div>
    </div>

    <!-- Puzzle Game -->
    <div class="game-section">
        <h2>Sliding Puzzle</h2>
        <p>Arrange the numbers in order!</p>
        <div class="puzzle-game"></div>
    </div>
</div>

<!-- Score Display -->
<div class="score-display">Score: 0</div>
@endsection 