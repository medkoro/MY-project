@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6">{{ $quiz->title }}</h1>
        
        <!-- Game elements UI -->
        <div class="game-ui mb-4 p-4 bg-gradient-to-r from-blue-100 to-purple-100 rounded-xl shadow-md">
            <div class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <div class="text-xl font-bold text-purple-700 mr-2">Score:</div>
                    <div id="score-display" class="text-2xl font-bold text-green-600">0</div>
                </div>
                <div class="flex items-center">
                    <div class="text-xl font-bold text-purple-700 mr-2">Time:</div>
                    <div id="timer" class="text-2xl font-bold text-blue-600">30</div>
                </div>
            </div>
            
            <!-- Progress Bar -->
            <div class="w-full bg-gray-200 rounded-full h-4 mb-2">
                <div id="progress-bar" class="bg-gradient-to-r from-green-400 to-blue-500 h-4 rounded-full transition-all duration-500" style="width: 0%"></div>
            </div>
            
            <div class="flex justify-between text-sm text-gray-600">
                <span>Question <span id="current-question">1</span> of {{ $quiz->questions->count() }}</span>
                <span id="progress-text">0%</span>
            </div>
        </div>
        
        <!-- Fun Games Section -->
        <div class="fun-games-section mb-6 p-4 bg-gradient-to-r from-pink-100 to-yellow-100 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold text-center text-purple-800 mb-3">Fun Mini-Games 🎮</h2>
            <p class="text-center mb-4">Take a break and play these fun games while you quiz!</p>
            
            <!-- Game Selection Tabs -->
            <div class="game-tabs flex justify-center mb-4 flex-wrap">
                <button class="game-tab px-4 py-2 mx-1 rounded-t-lg bg-blue-100 hover:bg-blue-200 active-game" data-game="catch-stars">Catch Stars</button>
                <button class="game-tab px-4 py-2 mx-1 rounded-t-lg bg-gray-100 hover:bg-blue-200" data-game="memory-cards">Memory Match</button>
                <button class="game-tab px-4 py-2 mx-1 rounded-t-lg bg-gray-100 hover:bg-blue-200" data-game="balloon-pop">Balloon Pop</button>
                <button class="game-tab px-4 py-2 mx-1 rounded-t-lg bg-gray-100 hover:bg-blue-200" data-game="word-scramble">Word Scramble</button>
                <button class="game-tab px-4 py-2 mx-1 rounded-t-lg bg-gray-100 hover:bg-blue-200" data-game="math-challenge">Math Challenge</button>
            </div>
            
            <!-- Game Containers -->
            <div class="game-containers p-4 bg-blue-50 rounded-xl border-2 border-blue-200">
                <!-- Catch Stars Game -->
                <div class="game-container active" id="catch-stars-game">
                    <div class="text-center mb-2">Click on stars to catch them before they disappear!</div>
                    <div class="stars-game-area relative h-64 bg-gradient-to-b from-indigo-900 to-purple-900 rounded-lg overflow-hidden">
                        <div class="stars-score absolute top-2 right-2 bg-yellow-100 px-2 py-1 rounded-lg text-yellow-800">Score: <span id="stars-score">0</span></div>
                    </div>
                </div>
                
                <!-- Memory Cards Game -->
                <div class="game-container hidden" id="memory-cards-game">
                    <div class="text-center mb-2">Match the pairs of cards!</div>
                    <div class="memory-game-area grid grid-cols-4 gap-2 justify-center">
                        <!-- Cards will be created by JS -->
                    </div>
                </div>
                
                <!-- Balloon Pop Game -->
                <div class="game-container hidden" id="balloon-pop-game">
                    <div class="text-center mb-2">Pop the balloons to reveal words!</div>
                    <div class="balloon-game-area relative h-64 bg-gradient-to-b from-blue-100 to-white rounded-lg overflow-hidden">
                        <!-- Balloons will be created by JS -->
                    </div>
                </div>
                
                <!-- Word Scramble Game -->
                <div class="game-container hidden" id="word-scramble-game">
                    <div class="text-center mb-2">Unscramble the educational words!</div>
                    <div class="word-scramble-area flex flex-col items-center justify-center h-64 bg-gradient-to-b from-green-100 to-blue-50 rounded-lg">
                        <div class="scrambled-word text-3xl font-bold tracking-wider mb-4"></div>
                        <div class="flex mb-4">
                            <input type="text" class="scramble-input px-4 py-2 rounded-lg border-2 border-green-300 focus:outline-none focus:border-green-500" placeholder="Type your answer...">
                            <button class="submit-word ml-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">Submit</button>
                        </div>
                        <div class="word-scramble-score text-xl">Score: <span id="scramble-score">0</span></div>
                        <div class="word-scramble-feedback mt-2 text-green-600 font-bold"></div>
                    </div>
                </div>
                
                <!-- Math Challenge Game -->
                <div class="game-container hidden" id="math-challenge-game">
                    <div class="text-center mb-2">Solve the math problems quickly!</div>
                    <div class="math-challenge-area flex flex-col items-center justify-center h-64 bg-gradient-to-b from-purple-100 to-pink-50 rounded-lg">
                        <div class="math-problem text-3xl font-bold mb-4"></div>
                        <div class="flex mb-4">
                            <input type="number" class="math-input px-4 py-2 rounded-lg border-2 border-purple-300 focus:outline-none focus:border-purple-500" placeholder="Answer">
                            <button class="submit-answer ml-2 bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg">Submit</button>
                        </div>
                        <div class="math-challenge-score text-xl">Score: <span id="math-score">0</span></div>
                        <div class="math-challenge-feedback mt-2 text-purple-600 font-bold"></div>
                        <div class="math-timer mt-2 bg-purple-200 h-2 w-full rounded-full overflow-hidden">
                            <div class="math-timer-bar bg-purple-500 h-full w-full"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Game Control Buttons -->
            <div class="game-controls flex justify-between mt-3">
                <button class="start-game bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">Start Game</button>
                <button class="end-game bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg hidden">Back to Quiz</button>
            </div>
            
            <div class="game-bonus mt-2 text-center text-sm text-gray-600">
                Get bonus points for your quiz by playing games!
            </div>
        </div>
        
        <form action="{{ route('quizzes.submit', $quiz) }}" method="POST" id="quiz-form">
            @csrf
            <input type="hidden" name="score" id="final-score" value="0">
            <input type="hidden" name="time_taken" id="time-taken" value="0">
            
            <div class="card mb-6">
                <div class="mb-4 flex justify-between">
                    <span class="badge bg-blue-100 text-blue-800 rounded-full px-3 py-1">{{ $quiz->category }}</span>
                </div>
                
                @foreach($quiz->questions as $index => $question)
                    <div class="question-container {{ $index > 0 ? 'hidden' : '' }}" data-question="{{ $index + 1 }}" data-id="{{ $question->id }}">
                        <h2 class="text-2xl font-bold mb-4">{{ $question->question_text }}</h2>
                        
                        @if($question->image_path)
                            <div class="mb-4 flex justify-center">
                                <img src="{{ asset('storage/' . $question->image_path) }}" alt="Question Image" class="max-h-64 rounded-lg">
                            </div>
                        @endif
                        
                        <div class="space-y-3 mb-6">
                            <label class="option-label block p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:bg-blue-50 transition-colors">
                                <input type="radio" name="answers[{{ $question->id }}]" value="a" class="answer-option mr-2" data-correct="{{ $question->correct_answer === 'a' ? 'true' : 'false' }}">
                                <span class="text-lg">A: {{ $question->option_a }}</span>
                            </label>
                            
                            <label class="option-label block p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:bg-blue-50 transition-colors">
                                <input type="radio" name="answers[{{ $question->id }}]" value="b" class="answer-option mr-2" data-correct="{{ $question->correct_answer === 'b' ? 'true' : 'false' }}">
                                <span class="text-lg">B: {{ $question->option_b }}</span>
                            </label>
                            
                            <label class="option-label block p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:bg-blue-50 transition-colors">
                                <input type="radio" name="answers[{{ $question->id }}]" value="c" class="answer-option mr-2" data-correct="{{ $question->correct_answer === 'c' ? 'true' : 'false' }}">
                                <span class="text-lg">C: {{ $question->option_c }}</span>
                            </label>
                            
                            @if($question->option_d)
                                <label class="option-label block p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:bg-blue-50 transition-colors">
                                    <input type="radio" name="answers[{{ $question->id }}]" value="d" class="answer-option mr-2" data-correct="{{ $question->correct_answer === 'd' ? 'true' : 'false' }}">
                                    <span class="text-lg">D: {{ $question->option_d }}</span>
                                </label>
                            @endif
                        </div>
                        
                        <!-- Feedback animation container -->
                        <div class="feedback-container mb-4 text-center hidden">
                            <div class="text-3xl font-bold feedback-text"></div>
                        </div>
                        
                        <!-- Mini-Games Section -->
                        <div class="mini-games-container mb-6 hidden">
                            <div class="text-xl font-bold text-center text-purple-600 mb-2">Fun Time! Play a quick game:</div>
                            
                            <!-- Game Selection Tabs -->
                            <div class="game-tabs flex justify-center mb-4 flex-wrap">
                                <button class="game-tab px-4 py-2 mx-1 rounded-t-lg bg-blue-100 hover:bg-blue-200 active-game" data-game="catch-stars">Catch Stars</button>
                                <button class="game-tab px-4 py-2 mx-1 rounded-t-lg bg-gray-100 hover:bg-blue-200" data-game="memory-cards">Memory Match</button>
                                <button class="game-tab px-4 py-2 mx-1 rounded-t-lg bg-gray-100 hover:bg-blue-200" data-game="balloon-pop">Balloon Pop</button>
                                <button class="game-tab px-4 py-2 mx-1 rounded-t-lg bg-gray-100 hover:bg-blue-200" data-game="word-scramble">Word Scramble</button>
                                <button class="game-tab px-4 py-2 mx-1 rounded-t-lg bg-gray-100 hover:bg-blue-200" data-game="math-challenge">Math Challenge</button>
                            </div>
                            
                            <!-- Game Containers -->
                            <div class="game-containers p-4 bg-blue-50 rounded-xl border-2 border-blue-200">
                                <!-- Catch Stars Game -->
                                <div class="game-container active" id="catch-stars-game">
                                    <div class="text-center mb-2">Click on stars to catch them before they disappear!</div>
                                    <div class="stars-game-area relative h-64 bg-gradient-to-b from-indigo-900 to-purple-900 rounded-lg overflow-hidden">
                                        <div class="stars-score absolute top-2 right-2 bg-yellow-100 px-2 py-1 rounded-lg text-yellow-800">Score: <span id="stars-score">0</span></div>
                                    </div>
                                </div>
                                
                                <!-- Memory Cards Game -->
                                <div class="game-container hidden" id="memory-cards-game">
                                    <div class="text-center mb-2">Match the pairs of cards!</div>
                                    <div class="memory-game-area grid grid-cols-4 gap-2 justify-center">
                                        <!-- Cards will be created by JS -->
                                    </div>
                                </div>
                                
                                <!-- Balloon Pop Game -->
                                <div class="game-container hidden" id="balloon-pop-game">
                                    <div class="text-center mb-2">Pop the balloons to reveal words!</div>
                                    <div class="balloon-game-area relative h-64 bg-gradient-to-b from-blue-100 to-white rounded-lg overflow-hidden">
                                        <!-- Balloons will be created by JS -->
                                    </div>
                                </div>
                                
                                <!-- Word Scramble Game -->
                                <div class="game-container hidden" id="word-scramble-game">
                                    <div class="text-center mb-2">Unscramble the educational words!</div>
                                    <div class="word-scramble-area flex flex-col items-center justify-center h-64 bg-gradient-to-b from-green-100 to-blue-50 rounded-lg">
                                        <div class="scrambled-word text-3xl font-bold tracking-wider mb-4"></div>
                                        <div class="flex mb-4">
                                            <input type="text" class="scramble-input px-4 py-2 rounded-lg border-2 border-green-300 focus:outline-none focus:border-green-500" placeholder="Type your answer...">
                                            <button class="submit-word ml-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">Submit</button>
                                        </div>
                                        <div class="word-scramble-score text-xl">Score: <span id="scramble-score">0</span></div>
                                        <div class="word-scramble-feedback mt-2 text-green-600 font-bold"></div>
                                    </div>
                                </div>
                                
                                <!-- Math Challenge Game -->
                                <div class="game-container hidden" id="math-challenge-game">
                                    <div class="text-center mb-2">Solve the math problems quickly!</div>
                                    <div class="math-challenge-area flex flex-col items-center justify-center h-64 bg-gradient-to-b from-purple-100 to-pink-50 rounded-lg">
                                        <div class="math-problem text-3xl font-bold mb-4"></div>
                                        <div class="flex mb-4">
                                            <input type="number" class="math-input px-4 py-2 rounded-lg border-2 border-purple-300 focus:outline-none focus:border-purple-500" placeholder="Answer">
                                            <button class="submit-answer ml-2 bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg">Submit</button>
                                        </div>
                                        <div class="math-challenge-score text-xl">Score: <span id="math-score">0</span></div>
                                        <div class="math-challenge-feedback mt-2 text-purple-600 font-bold"></div>
                                        <div class="math-timer mt-2 bg-purple-200 h-2 w-full rounded-full overflow-hidden">
                                            <div class="math-timer-bar bg-purple-500 h-full w-full"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Game Control Buttons -->
                            <div class="game-controls flex justify-between mt-3">
                                <button class="start-game bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">Start Game</button>
                                <button class="end-game bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg hidden">Back to Quiz</button>
                            </div>
                        </div>
                        
                        <div class="flex justify-between">
                            @if($index > 0)
                                <button type="button" class="btn btn-secondary prev-question">Previous</button>
                            @else
                                <div></div>
                            @endif
                            
                            @if($index < $quiz->questions->count() - 1)
                                <button type="button" class="btn btn-primary next-question">Next</button>
                            @else
                                <button type="submit" class="btn btn-primary">Submit Quiz</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Quiz game script loaded successfully');
        
        // Elements
        const form = document.getElementById('quiz-form');
        const questions = document.querySelectorAll('.question-container');
        const currentQuestionEl = document.getElementById('current-question');
        const timerEl = document.getElementById('timer');
        const scoreDisplay = document.getElementById('score-display');
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');
        const finalScoreInput = document.getElementById('final-score');
        const timeTakenInput = document.getElementById('time-taken');
        
        // Game state
        let currentQuestion = 1;
        let score = 0;
        let timer = 30;
        let timerInterval;
        let totalQuestions = questions.length;
        let answered = {};
        let timeTaken = 0;
        let gameStartTime = Date.now();
        let gameScore = 0;
        let currentGame = null;
        let gameInterval = null;
        
        // Initialize progress
        updateProgress();
        
        // Start timer for the first question
        startTimer();
        
        // Answer selection handlers
        document.querySelectorAll('.answer-option').forEach(option => {
            option.addEventListener('change', function() {
                const questionId = this.closest('.question-container').dataset.id;
                const isCorrect = this.dataset.correct === 'true';
                const feedbackContainer = this.closest('.question-container').querySelector('.feedback-container');
                const feedbackText = feedbackContainer.querySelector('.feedback-text');
                
                // Only process if not already answered
                if (!answered[questionId]) {
                    // Mark as answered
                    answered[questionId] = true;
                    
                    // Stop the timer
                    clearInterval(timerInterval);
                    
                    // Show feedback
                    feedbackContainer.classList.remove('hidden');
                    
                    if (isCorrect) {
                        // Correct answer
                        const pointsEarned = Math.max(5, timer);
                        score += pointsEarned;
                        scoreDisplay.textContent = score;
                        finalScoreInput.value = score;
                        
                        // Correct feedback
                        feedbackText.textContent = `Correct! +${pointsEarned} points`;
                        feedbackText.classList.add('text-green-600');
                        feedbackContainer.classList.add('animate-bounce-once');
                        this.closest('.option-label').classList.add('correct-answer');
                        
                        // Show mini-game as reward for correct answer
                        setTimeout(() => {
                            const miniGamesContainer = this.closest('.question-container').querySelector('.mini-games-container');
                            if (miniGamesContainer) {
                                miniGamesContainer.classList.remove('hidden');
                                initializeGame('catch-stars');
                            }
                        }, 1500);
                    } else {
                        // Incorrect feedback
                        feedbackText.textContent = 'Incorrect!';
                        feedbackText.classList.add('text-red-600');
                        feedbackContainer.classList.add('animate-shake');
                        this.closest('.option-label').classList.add('wrong-answer');
                        
                        // Show correct answer
                        const correctOption = document.querySelector(`input[name="answers[${questionId}]"][data-correct="true"]`);
                        correctOption.closest('.option-label').classList.add('correct-answer');
                    }
                    
                    // Enable next button automatically after a delay
                    setTimeout(() => {
                        const nextButton = this.closest('.question-container').querySelector('.next-question');
                        if (nextButton) {
                            nextButton.classList.add('animate-pulse');
                        }
                    }, 1500);
                }
            });
        });
        
        // Navigation handlers
        document.querySelectorAll('.next-question').forEach(button => {
            button.addEventListener('click', function() {
                // End any running games first
                if (gameInterval) {
                    clearInterval(gameInterval);
                    gameInterval = null;
                }
                
                const currentQuestionEl = document.getElementById('current-question');
                const currentQuestionNum = parseInt(currentQuestionEl.textContent);
                const nextQuestion = currentQuestionNum + 1;
                
                document.querySelector(`[data-question="${currentQuestionNum}"]`).classList.add('hidden');
                document.querySelector(`[data-question="${nextQuestion}"]`).classList.remove('hidden');
                
                currentQuestionEl.textContent = nextQuestion;
                currentQuestion = nextQuestion;
                
                // Reset timer for next question
                clearInterval(timerInterval);
                timer = 30;
                timerEl.textContent = timer;
                startTimer();
                
                // Update progress
                updateProgress();
                
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
        
        document.querySelectorAll('.prev-question').forEach(button => {
            button.addEventListener('click', function() {
                const currentQuestionEl = document.getElementById('current-question');
                const currentQuestionNum = parseInt(currentQuestionEl.textContent);
                const prevQuestion = currentQuestionNum - 1;
                
                document.querySelector(`[data-question="${currentQuestionNum}"]`).classList.add('hidden');
                document.querySelector(`[data-question="${prevQuestion}"]`).classList.remove('hidden');
                
                currentQuestionEl.textContent = prevQuestion;
                currentQuestion = prevQuestion;
                
                // Reset timer for previous question if not answered
                const questionId = document.querySelector(`[data-question="${prevQuestion}"]`).dataset.id;
                if (!answered[questionId]) {
                    clearInterval(timerInterval);
                    timer = 30;
                    timerEl.textContent = timer;
                    startTimer();
                }
                
                // Update progress
                updateProgress();
                
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
        
        // Form submission
        form.addEventListener('submit', function(e) {
            // Calculate total time taken
            timeTaken = Math.floor((Date.now() - gameStartTime) / 1000);
            timeTakenInput.value = timeTaken;
            
            // Check if all questions are answered
            const questionIds = [];
            questions.forEach(question => {
                const questionId = question.querySelector('input').name.match(/\d+/)[0];
                if (!questionIds.includes(questionId)) {
                    questionIds.push(questionId);
                }
            });
            
            let allAnswered = true;
            questionIds.forEach(id => {
                const answered = document.querySelector(`input[name="answers[${id}]"]:checked`);
                if (!answered) {
                    allAnswered = false;
                }
            });
            
            if (!allAnswered) {
                e.preventDefault();
                alert('Please answer all questions before submitting.');
                
                // Go to the first unanswered question
                for (let i = 0; i < questionIds.length; i++) {
                    const id = questionIds[i];
                    const answered = document.querySelector(`input[name="answers[${id}]"]:checked`);
                    if (!answered) {
                        const questionEl = document.querySelector(`input[name="answers[${id}]"]`).closest('.question-container');
                        const questionNum = questionEl.dataset.question;
                        
                        questions.forEach(q => q.classList.add('hidden'));
                        questionEl.classList.remove('hidden');
                        currentQuestionEl.textContent = questionNum;
                        currentQuestion = parseInt(questionNum);
                        
                        // Update progress
                        updateProgress();
                        break;
                    }
                }
            }
        });
        
        // Timer function
        function startTimer() {
            timerInterval = setInterval(() => {
                timer--;
                timerEl.textContent = timer;
                
                // Change color based on time left
                if (timer <= 10) {
                    timerEl.classList.remove('text-blue-600');
                    timerEl.classList.add('text-red-600');
                    
                    if (timer <= 5) {
                        timerEl.classList.add('animate-pulse');
                    }
                } else {
                    timerEl.classList.remove('text-red-600');
                    timerEl.classList.add('text-blue-600');
                    timerEl.classList.remove('animate-pulse');
                }
                
                // If time's up
                if (timer <= 0) {
                    clearInterval(timerInterval);
                    
                    // Mark current question as timed out
                    const currentQuestionEl = document.querySelector(`[data-question="${currentQuestion}"]`);
                    const questionId = currentQuestionEl.dataset.id;
                    answered[questionId] = true;
                    
                    // Show timeout message
                    const feedbackContainer = currentQuestionEl.querySelector('.feedback-container');
                    const feedbackText = feedbackContainer.querySelector('.feedback-text');
                    feedbackContainer.classList.remove('hidden');
                    feedbackText.textContent = 'Time\'s up!';
                    feedbackText.classList.add('text-orange-600');
                    
                    // Show correct answer
                    const correctOption = document.querySelector(`input[name="answers[${questionId}]"][data-correct="true"]`);
                    correctOption.closest('.option-label').classList.add('correct-answer');
                    
                    // Enable next button automatically after a delay
                    setTimeout(() => {
                        const nextButton = currentQuestionEl.querySelector('.next-question');
                        if (nextButton) {
                            nextButton.classList.add('animate-pulse');
                        }
                    }, 1500);
                }
            }, 1000);
        }
        
        // Update progress bar
        function updateProgress() {
            const progress = (currentQuestion - 1) / totalQuestions * 100;
            progressBar.style.width = `${progress}%`;
            progressText.textContent = `${Math.round(progress)}%`;
        }
        
        // Mini-Games Functionality
        document.querySelectorAll('.game-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                const gameType = this.dataset.game;
                
                // Update active tab
                document.querySelectorAll('.game-tab').forEach(t => {
                    t.classList.remove('active-game', 'bg-blue-100');
                    t.classList.add('bg-gray-100');
                });
                this.classList.remove('bg-gray-100');
                this.classList.add('active-game', 'bg-blue-100');
                
                // Show selected game
                document.querySelectorAll('.game-container').forEach(container => {
                    container.classList.add('hidden');
                });
                document.getElementById(`${gameType}-game`).classList.remove('hidden');
                
                // Initialize the selected game
                initializeGame(gameType);
            });
        });
        
        // Start Game Button
        document.querySelectorAll('.start-game').forEach(button => {
            button.addEventListener('click', function(e) {
                console.log('Start game button clicked');
                e.preventDefault(); // Prevent form submission if in a form
                
                const gameContainer = this.closest('.mini-games-container, .fun-games-section');
                const activeGameEl = gameContainer.querySelector('.game-container:not(.hidden)');
                
                if (!activeGameEl) {
                    console.error('No active game container found');
                    return;
                }
                
                const activeGame = activeGameEl.id.replace('-game', '');
                console.log('Starting game:', activeGame);
                
                this.classList.add('hidden');
                gameContainer.querySelector('.end-game').classList.remove('hidden');
                
                startGame(activeGame);
            });
        });
        
        // End Game Button
        document.querySelectorAll('.end-game').forEach(button => {
            button.addEventListener('click', function() {
                endCurrentGame();
                
                const gameContainer = this.closest('.mini-games-container, .fun-games-section');
                gameContainer.classList.add('hidden');
                this.classList.add('hidden');
                gameContainer.querySelector('.start-game').classList.remove('hidden');
                
                // Show next button
                const nextButton = this.closest('.question-container').querySelector('.next-question');
                if (nextButton) {
                    nextButton.classList.add('animate-pulse');
                }
            });
        });
        
        // Game Initialization
        function initializeGame(gameType) {
            // Reset game state
            gameScore = 0;
            if (gameInterval) {
                clearInterval(gameInterval);
                gameInterval = null;
            }
            
            currentGame = gameType;
            
            switch (gameType) {
                case 'catch-stars':
                    document.querySelectorAll('#stars-score').forEach(el => {
                        el.textContent = '0';
                    });
                    document.querySelectorAll('.stars-game-area').forEach(area => {
                        area.innerHTML = '<div class="stars-score absolute top-2 right-2 bg-yellow-100 px-2 py-1 rounded-lg text-yellow-800">Score: <span id="stars-score">0</span></div>';
                    });
                    break;
                    
                case 'memory-cards':
                    const memoryArea = document.querySelector('.memory-game-area');
                    memoryArea.innerHTML = '';
                    
                    // Create card pairs (8 cards = 4 pairs)
                    const emojis = ['🍎', '🍌', '🍒', '🍕', '🚀', '⚽', '🦄', '🎸'];
                    const shuffled = [...emojis.slice(0, 4), ...emojis.slice(0, 4)].sort(() => Math.random() - 0.5);
                    
                    shuffled.forEach((emoji, index) => {
                        const card = document.createElement('div');
                        card.className = 'memory-card bg-white rounded-lg h-20 flex items-center justify-center cursor-pointer transform transition-transform duration-300 shadow';
                        card.innerHTML = `
                            <div class="card-front hidden text-3xl">${emoji}</div>
                            <div class="card-back text-3xl">❓</div>
                        `;
                        card.dataset.value = emoji;
                        card.dataset.index = index;
                        memoryArea.appendChild(card);
                    });
                    break;
                    
                case 'balloon-pop':
                    const balloonArea = document.querySelector('.balloon-game-area');
                    balloonArea.innerHTML = '';
                    break;
                    
                case 'word-scramble':
                    const scrambleArea = document.querySelector('.word-scramble-area');
                    scrambleArea.innerHTML = `
                        <div class="scrambled-word text-3xl font-bold tracking-wider mb-4"></div>
                        <div class="flex mb-4">
                            <input type="text" class="scramble-input px-4 py-2 rounded-lg border-2 border-green-300 focus:outline-none focus:border-green-500" placeholder="Type your answer...">
                            <button class="submit-word ml-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">Submit</button>
                        </div>
                        <div class="word-scramble-score text-xl">Score: <span id="scramble-score">0</span></div>
                        <div class="word-scramble-feedback mt-2 text-green-600 font-bold"></div>
                    `;
                    break;
                    
                case 'math-challenge':
                    const mathArea = document.querySelector('.math-challenge-area');
                    mathArea.innerHTML = `
                        <div class="math-problem text-3xl font-bold mb-4"></div>
                        <div class="flex mb-4">
                            <input type="number" class="math-input px-4 py-2 rounded-lg border-2 border-purple-300 focus:outline-none focus:border-purple-500" placeholder="Answer">
                            <button class="submit-answer ml-2 bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg">Submit</button>
                        </div>
                        <div class="math-challenge-score text-xl">Score: <span id="math-score">0</span></div>
                        <div class="math-challenge-feedback mt-2 text-purple-600 font-bold"></div>
                        <div class="math-timer mt-2 bg-purple-200 h-2 w-full rounded-full overflow-hidden">
                            <div class="math-timer-bar bg-purple-500 h-full w-full"></div>
                        </div>
                    `;
                    break;
            }
        }
        
        // Start the selected game
        function startGame(gameType) {
            switch (gameType) {
                case 'catch-stars':
                    startCatchStarsGame();
                    break;
                    
                case 'memory-cards':
                    startMemoryGame();
                    break;
                    
                case 'balloon-pop':
                    startBalloonGame();
                    break;
                    
                case 'word-scramble':
                    startWordScrambleGame();
                    break;
                    
                case 'math-challenge':
                    startMathChallengeGame();
                    break;
            }
        }
        
        // End current game
        function endCurrentGame() {
            if (gameInterval) {
                clearInterval(gameInterval);
                gameInterval = null;
            }
            
            // Add bonus points to quiz score based on mini-game score
            if (gameScore > 0) {
                const bonusPoints = Math.min(Math.floor(gameScore / 2), 10);
                score += bonusPoints;
                scoreDisplay.textContent = score;
                finalScoreInput.value = score;
            }
        }
        
        // Catch Stars Game
        function startCatchStarsGame() {
            gameScore = 0;
            document.querySelectorAll('#stars-score').forEach(el => {
                el.textContent = '0';
            });
            
            const gameArea = document.querySelector('.stars-game-area');
            const gameDuration = 15000; // 15 seconds
            const endTime = Date.now() + gameDuration;
            
            // Create falling stars
            gameInterval = setInterval(() => {
                // Check if game time is up
                if (Date.now() >= endTime) {
                    clearInterval(gameInterval);
                    gameInterval = null;
                    
                    document.querySelector('.end-game').click();
                    return;
                }
                
                // Create a new star
                const star = document.createElement('div');
                star.className = 'absolute text-4xl cursor-pointer animate-fall';
                star.innerHTML = '⭐';
                star.style.left = `${Math.random() * 90}%`;
                star.style.top = '-20px';
                
                // Random size
                const size = 24 + Math.floor(Math.random() * 24);
                star.style.fontSize = `${size}px`;
                
                // Click handler for star
                star.addEventListener('click', () => {
                    // Update score based on star size (smaller = more points)
                    const points = Math.max(1, Math.ceil(48 / size));
                    gameScore += points;
                    document.querySelectorAll('#stars-score').forEach(el => {
                        el.textContent = gameScore;
                    });
                    
                    // Remove star with sparkle effect
                    star.innerHTML = '✨';
                    star.style.pointerEvents = 'none';
                    setTimeout(() => star.remove(), 300);
                });
                
                gameArea.appendChild(star);
                
                // Remove star after animation (if not clicked)
                setTimeout(() => {
                    if (star.parentNode === gameArea) {
                        star.remove();
                    }
                }, 3000);
                
            }, 500);
        }
        
        // Memory Cards Game
        function startMemoryGame() {
            gameScore = 0;
            let flippedCards = [];
            let matchedPairs = 0;
            const startTime = Date.now();
            
            const cards = document.querySelectorAll('.memory-card');
            cards.forEach(card => {
                card.addEventListener('click', () => {
                    // Ignore clicks on already matched or flipped cards
                    if (card.classList.contains('matched') || flippedCards.includes(card) || flippedCards.length >= 2) {
                        return;
                    }
                    
                    // Flip card
                    const front = card.querySelector('.card-front');
                    const back = card.querySelector('.card-back');
                    front.classList.remove('hidden');
                    back.classList.add('hidden');
                    card.classList.add('flipped');
                    
                    // Add to flipped cards
                    flippedCards.push(card);
                    
                    // Check for match if two cards are flipped
                    if (flippedCards.length === 2) {
                        const [card1, card2] = flippedCards;
                        
                        if (card1.dataset.value === card2.dataset.value) {
                            // Match!
                            setTimeout(() => {
                                card1.classList.add('matched', 'bg-green-100');
                                card2.classList.add('matched', 'bg-green-100');
                                flippedCards = [];
                                
                                // Add points for match
                                gameScore += 5;
                                
                                // Check for game completion
                                matchedPairs++;
                                if (matchedPairs === 4) {
                                    // Game complete - add time bonus
                                    const timeTaken = Math.floor((Date.now() - startTime) / 1000);
                                    const timeBonus = Math.max(0, 30 - timeTaken);
                                    gameScore += timeBonus;
                                    
                                    // End game after a short delay
                                    setTimeout(() => {
                                        document.querySelector('.end-game').click();
                                    }, 1000);
                                }
                            }, 500);
                        } else {
                            // No match, flip back
                            setTimeout(() => {
                                card1.querySelector('.card-front').classList.add('hidden');
                                card1.querySelector('.card-back').classList.remove('hidden');
                                card2.querySelector('.card-front').classList.add('hidden');
                                card2.querySelector('.card-back').classList.remove('hidden');
                                card1.classList.remove('flipped');
                                card2.classList.remove('flipped');
                                flippedCards = [];
                            }, 800);
                        }
                    }
                });
            });
        }
        
        // Balloon Pop Game
        function startBalloonGame() {
            gameScore = 0;
            const balloonArea = document.querySelector('.balloon-game-area');
            const words = ['Math', 'Science', 'Learning', 'Fun', 'School', 'Kids', 'Education', 'Knowledge'];
            const gameDuration = 15000; // 15 seconds
            const endTime = Date.now() + gameDuration;
            let balloonsPopped = 0;
            
            // Create balloons
            gameInterval = setInterval(() => {
                // Check if game time is up
                if (Date.now() >= endTime) {
                    clearInterval(gameInterval);
                    gameInterval = null;
                    
                    document.querySelector('.end-game').click();
                    return;
                }
                
                // Create a new balloon
                const balloon = document.createElement('div');
                const color = ['red', 'blue', 'green', 'yellow', 'purple', 'pink'][Math.floor(Math.random() * 6)];
                balloon.className = `balloon absolute w-16 h-20 rounded-full cursor-pointer animate-float bg-${color}-400`;
                balloon.style.left = `${Math.random() * 80}%`;
                balloon.style.bottom = '-50px';
                
                // Add word
                const word = words[Math.floor(Math.random() * words.length)];
                balloon.innerHTML = `<div class="text-xs font-bold text-center text-white mt-6">${word}</div>`;
                balloon.dataset.word = word;
                
                // Click handler for balloon
                balloon.addEventListener('click', () => {
                    // Update score
                    gameScore += 2;
                    balloonsPopped++;
                    
                    // Pop animation
                    balloon.classList.remove(`animate-float`);
                    balloon.innerHTML = '💥';
                    balloon.classList.add('text-4xl', 'flex', 'items-center', 'justify-center');
                    
                    // Remove balloon after animation
                    setTimeout(() => balloon.remove(), 300);
                });
                
                balloonArea.appendChild(balloon);
                
                // Remove balloon after animation (if not popped)
                setTimeout(() => {
                    if (balloon.parentNode === balloonArea) {
                        balloon.remove();
                    }
                }, 6000);
                
            }, 800);
        }
        
        // Word Scramble Game
        function startWordScrambleGame() {
            gameScore = 0;
            const scrambleArea = document.querySelector('.word-scramble-area');
            const words = ['Math', 'Science', 'Learning', 'Fun', 'School', 'Kids', 'Education', 'Knowledge'];
            const word = words[Math.floor(Math.random() * words.length)];
            const scrambledWord = word.split('').sort(() => Math.random() - 0.5).join('');
            scrambleArea.querySelector('.scrambled-word').textContent = scrambledWord;
            
            // Submit handler
            scrambleArea.querySelector('.submit-word').addEventListener('click', () => {
                const answer = scrambleArea.querySelector('.scramble-input').value;
                if (answer.toLowerCase() === word.toLowerCase()) {
                    // Correct answer
                    gameScore += 10;
                    scrambleArea.querySelector('#scramble-score').textContent = gameScore;
                    scrambleArea.querySelector('.word-scramble-feedback').textContent = 'Correct!';
                    scrambleArea.querySelector('.word-scramble-feedback').classList.add('text-green-600');
                } else {
                    // Incorrect answer
                    scrambleArea.querySelector('.word-scramble-feedback').textContent = 'Incorrect!';
                    scrambleArea.querySelector('.word-scramble-feedback').classList.add('text-red-600');
                }
                
                // Reset input
                scrambleArea.querySelector('.scramble-input').value = '';
                
                // End game after a short delay
                setTimeout(() => {
                    document.querySelector('.end-game').click();
                }, 1000);
            });
        }
        
        // Math Challenge Game
        function startMathChallengeGame() {
            gameScore = 0;
            const mathArea = document.querySelector('.math-challenge-area');
            const numbers = [10, 20, 30, 40, 50];
            const num1 = numbers[Math.floor(Math.random() * numbers.length)];
            const num2 = numbers[Math.floor(Math.random() * numbers.length)];
            const operator = ['+', '-', '*'][Math.floor(Math.random() * 3)];
            const mathProblem = `${num1} ${operator} ${num2}`;
            mathArea.querySelector('.math-problem').textContent = mathProblem;
            
            // Submit handler
            mathArea.querySelector('.submit-answer').addEventListener('click', () => {
                const answer = mathArea.querySelector('.math-input').value;
                let correctAnswer;
                switch (operator) {
                    case '+':
                        correctAnswer = num1 + num2;
                        break;
                    case '-':
                        correctAnswer = num1 - num2;
                        break;
                    case '*':
                        correctAnswer = num1 * num2;
                        break;
                }
                
                if (answer == correctAnswer) {
                    // Correct answer
                    gameScore += 10;
                    mathArea.querySelector('#math-score').textContent = gameScore;
                    mathArea.querySelector('.math-challenge-feedback').textContent = 'Correct!';
                    mathArea.querySelector('.math-challenge-feedback').classList.add('text-green-600');
                } else {
                    // Incorrect answer
                    mathArea.querySelector('.math-challenge-feedback').textContent = 'Incorrect!';
                    mathArea.querySelector('.math-challenge-feedback').classList.add('text-red-600');
                }
                
                // Reset input
                mathArea.querySelector('.math-input').value = '';
                
                // End game after a short delay
                setTimeout(() => {
                    document.querySelector('.end-game').click();
                }, 1000);
            });
        }
        
        // Once DOM is loaded, initialize the main game UI
        console.log('Initializing catch-stars game');
        initializeGame('catch-stars');
        
        // Configure game sections
        console.log('Setting up game controls');
        
        // Make all game tabs work for both game sections
        document.querySelectorAll('.game-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                const gameType = this.dataset.game;
                const parentSection = this.closest('.fun-games-section, .mini-games-container');
                
                // Update active tab for all tabs with same game type across sections
                document.querySelectorAll(`.game-tab[data-game="${gameType}"]`).forEach(t => {
                    t.classList.remove('bg-gray-100');
                    t.classList.add('active-game', 'bg-blue-100');
                });
                
                document.querySelectorAll('.game-tab').forEach(t => {
                    if (t.dataset.game !== gameType) {
                        t.classList.remove('active-game', 'bg-blue-100');
                        t.classList.add('bg-gray-100');
                    }
                });
                
                // Show selected game in the current section
                if (parentSection) {
                    parentSection.querySelectorAll('.game-container').forEach(container => {
                        container.classList.add('hidden');
                    });
                    parentSection.querySelector(`#${gameType}-game`).classList.remove('hidden');
                }
                
                // Initialize the selected game
                initializeGame(gameType);
            });
        });
    });
</script>

<style>
    /* Animation for correct/wrong answers */
    .correct-answer {
        background-color: rgba(34, 197, 94, 0.2) !important;
        border-color: rgb(34, 197, 94) !important;
        transform: scale(1.02);
        transition: all 0.3s ease;
    }
    
    .wrong-answer {
        background-color: rgba(239, 68, 68, 0.2) !important;
        border-color: rgb(239, 68, 68) !important;
        transform: scale(0.98);
        transition: all 0.3s ease;
    }
    
    @keyframes bounce-once {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
    
    .animate-bounce-once {
        animation: bounce-once 1s ease;
    }
    
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
    }
    
    .animate-shake {
        animation: shake 0.5s ease;
    }
    
    /* Game Styles */
    .active-game {
        font-weight: bold;
        box-shadow: 0 2px 0 0 rgba(59, 130, 246, 0.5);
    }
    
    @keyframes fall {
        from { transform: translateY(0); }
        to { transform: translateY(300px); }
    }
    
    .animate-fall {
        animation: fall 3s linear forwards;
    }
    
    @keyframes float {
        from { transform: translateY(0) rotate(5deg); }
        50% { transform: translateY(-150px) rotate(-5deg); }
        to { transform: translateY(-300px) rotate(5deg); }
    }
    
    .animate-float {
        animation: float 6s ease-in-out forwards;
    }
    
    .balloon {
        position: relative;
    }
    
    .balloon:before {
        content: '';
        position: absolute;
        width: 6px;
        height: 10px;
        background: #666;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 0 0 3px 3px;
    }
</style>
@endsection
