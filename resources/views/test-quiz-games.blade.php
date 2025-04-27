@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6">Test Quiz Games</h1>
        
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
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Test quiz game script loaded successfully');
        
        // Game state
        let gameScore = 0;
        let currentGame = null;
        let gameInterval = null;
        
        // Initialize the main game UI
        console.log('Initializing catch-stars game');
        initializeGame('catch-stars');
        
        // Make all game tabs work
        document.querySelectorAll('.game-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                const gameType = this.dataset.game;
                const parentSection = this.closest('.fun-games-section');
                
                console.log('Game tab clicked:', gameType);
                
                // Update active tab
                document.querySelectorAll('.game-tab').forEach(t => {
                    t.classList.remove('active-game', 'bg-blue-100');
                    t.classList.add('bg-gray-100');
                });
                this.classList.remove('bg-gray-100');
                this.classList.add('active-game', 'bg-blue-100');
                
                // Show selected game
                if (parentSection) {
                    parentSection.querySelectorAll('.game-container').forEach(container => {
                        container.classList.add('hidden');
                    });
                    const gameContainer = parentSection.querySelector(`#${gameType}-game`);
                    if (gameContainer) {
                        gameContainer.classList.remove('hidden');
                    } else {
                        console.error(`Game container #${gameType}-game not found in section`);
                    }
                }
                
                // Initialize the selected game
                initializeGame(gameType);
            });
        });
        
        // Start Game Button
        document.querySelectorAll('.start-game').forEach(button => {
            button.addEventListener('click', function(e) {
                console.log('Start game button clicked');
                e.preventDefault(); // Prevent form submission if in a form
                
                const gameContainer = this.closest('.fun-games-section');
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
                console.log('End game button clicked');
                endCurrentGame();
                
                const gameContainer = this.closest('.fun-games-section');
                this.classList.add('hidden');
                gameContainer.querySelector('.start-game').classList.remove('hidden');
            });
        });
        
        // Game Initialization
        function initializeGame(gameType) {
            console.log('Initializing game:', gameType);
            
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
                    const wordScrambleArea = document.querySelector('.word-scramble-area');
                    wordScrambleArea.innerHTML = `
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
                    const mathChallengeArea = document.querySelector('.math-challenge-area');
                    mathChallengeArea.innerHTML = `
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
            console.log('Starting game:', gameType);
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
            console.log('Ending current game');
            if (gameInterval) {
                clearInterval(gameInterval);
                gameInterval = null;
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
            document.querySelector('#scramble-score').textContent = '0';
            
            // Educational words for scrambling
            const words = [
                'EDUCATION', 'KNOWLEDGE', 'LEARNING', 'SCIENCE', 'MATHEMATICS', 
                'READING', 'WRITING', 'HISTORY', 'GEOGRAPHY', 'PHYSICS', 
                'CHEMISTRY', 'BIOLOGY', 'LANGUAGE', 'LITERATURE', 'RESEARCH'
            ];
            
            let currentWordIndex = 0;
            let wordsCompleted = 0;
            let startTime = Date.now();
            const gameDuration = 60000; // 1 minute
            const maxWords = 10; // Max words to complete
            
            // Scramble a word
            function scrambleWord(word) {
                let scrambled = '';
                const letters = word.split('');
                while (letters.length > 0) {
                    const index = Math.floor(Math.random() * letters.length);
                    scrambled += letters[index];
                    letters.splice(index, 1);
                }
                return scrambled;
            }
            
            // Show next word
            function showNextWord() {
                if (wordsCompleted >= maxWords || Date.now() - startTime > gameDuration) {
                    // Game over
                    document.querySelector('.end-game').click();
                    return;
                }
                
                currentWordIndex = Math.floor(Math.random() * words.length);
                const word = words[currentWordIndex];
                const scrambled = scrambleWord(word);
                
                document.querySelector('.scrambled-word').textContent = scrambled;
                document.querySelector('.scramble-input').value = '';
                document.querySelector('.word-scramble-feedback').textContent = '';
                document.querySelector('.scramble-input').focus();
            }
            
            // Set up submit button
            const submitButton = document.querySelector('.submit-word');
            const input = document.querySelector('.scramble-input');
            
            const submitGuess = () => {
                const guess = input.value.trim().toUpperCase();
                const correctWord = words[currentWordIndex];
                
                if (guess === correctWord) {
                    // Correct!
                    document.querySelector('.word-scramble-feedback').textContent = 'Correct! +5 points';
                    document.querySelector('.word-scramble-feedback').classList.remove('text-red-600');
                    document.querySelector('.word-scramble-feedback').classList.add('text-green-600');
                    gameScore += 5;
                    document.querySelector('#scramble-score').textContent = gameScore;
                    wordsCompleted++;
                    
                    // Show next word after a delay
                    setTimeout(showNextWord, 1000);
                } else {
                    // Wrong
                    document.querySelector('.word-scramble-feedback').textContent = 'Try again!';
                    document.querySelector('.word-scramble-feedback').classList.remove('text-green-600');
                    document.querySelector('.word-scramble-feedback').classList.add('text-red-600');
                }
            };
            
            submitButton.addEventListener('click', submitGuess);
            input.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    submitGuess();
                }
            });
            
            // Start timer
            gameInterval = setInterval(() => {
                if (Date.now() - startTime > gameDuration) {
                    clearInterval(gameInterval);
                    gameInterval = null;
                    document.querySelector('.end-game').click();
                }
            }, 1000);
            
            // Show first word
            showNextWord();
        }
        
        // Math Challenge Game
        function startMathChallengeGame() {
            gameScore = 0;
            document.querySelector('#math-score').textContent = '0';
            
            let currentProblem;
            let problemsSolved = 0;
            let startTime = Date.now();
            const gameDuration = 45000; // 45 seconds
            const timerBar = document.querySelector('.math-timer-bar');
            const problemsPerGame = 10;
            
            // Generate a random math problem
            function generateProblem() {
                const operations = ['+', '-', '*'];
                const operation = operations[Math.floor(Math.random() * operations.length)];
                
                let num1, num2, solution;
                
                switch (operation) {
                    case '+':
                        num1 = Math.floor(Math.random() * 50) + 1;
                        num2 = Math.floor(Math.random() * 50) + 1;
                        solution = num1 + num2;
                        break;
                    case '-':
                        num1 = Math.floor(Math.random() * 50) + 50; // Ensure larger number
                        num2 = Math.floor(Math.random() * 50) + 1;
                        solution = num1 - num2;
                        break;
                    case '*':
                        num1 = Math.floor(Math.random() * 12) + 1; // Times tables 1-12
                        num2 = Math.floor(Math.random() * 12) + 1;
                        solution = num1 * num2;
                        break;
                }
                
                return {
                    problem: `${num1} ${operation} ${num2} = ?`,
                    solution: solution
                };
            }
            
            // Show next problem
            function showNextProblem() {
                if (problemsSolved >= problemsPerGame || Date.now() - startTime > gameDuration) {
                    // Game over
                    document.querySelector('.end-game').click();
                    return;
                }
                
                currentProblem = generateProblem();
                document.querySelector('.math-problem').textContent = currentProblem.problem;
                document.querySelector('.math-input').value = '';
                document.querySelector('.math-challenge-feedback').textContent = '';
                document.querySelector('.math-input').focus();
            }
            
            // Set up submit button
            const submitButton = document.querySelector('.submit-answer');
            const input = document.querySelector('.math-input');
            
            const submitAnswer = () => {
                const answer = parseInt(input.value.trim());
                
                if (!isNaN(answer) && answer === currentProblem.solution) {
                    // Correct!
                    document.querySelector('.math-challenge-feedback').textContent = 'Correct! +10 points';
                    document.querySelector('.math-challenge-feedback').classList.remove('text-red-600');
                    document.querySelector('.math-challenge-feedback').classList.add('text-green-600');
                    
                    // Add points based on remaining time
                    const timeElapsed = Date.now() - startTime;
                    const timePercentage = 1 - (timeElapsed / gameDuration);
                    const timeBonus = Math.floor(timePercentage * 5);
                    gameScore += 10 + timeBonus;
                    
                    document.querySelector('#math-score').textContent = gameScore;
                    problemsSolved++;
                    
                    // Show next problem after a delay
                    setTimeout(showNextProblem, 800);
                } else {
                    // Wrong
                    document.querySelector('.math-challenge-feedback').textContent = 'Try again!';
                    document.querySelector('.math-challenge-feedback').classList.remove('text-green-600');
                    document.querySelector('.math-challenge-feedback').classList.add('text-red-600');
                }
            };
            
            submitButton.addEventListener('click', submitAnswer);
            input.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    submitAnswer();
                }
            });
            
            // Update timer bar
            gameInterval = setInterval(() => {
                const timeElapsed = Date.now() - startTime;
                const timePercentage = 1 - (timeElapsed / gameDuration);
                
                if (timePercentage <= 0) {
                    clearInterval(gameInterval);
                    gameInterval = null;
                    document.querySelector('.end-game').click();
                    return;
                }
                
                timerBar.style.width = `${timePercentage * 100}%`;
            }, 100);
            
            // Show first problem
            showNextProblem();
        }
    });
</script>

<style>
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
