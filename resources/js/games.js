// Game System
class GameSystem {
    constructor() {
        this.currentScore = 0;
        this.highScores = JSON.parse(localStorage.getItem('highScores')) || {};
        this.currentUser = null;
    }

    // Initialize games
    initGames() {
        this.setupMemoryGame();
        this.setupMathGame();
        this.setupWordGame();
        this.setupPuzzleGame();
    }

    // Memory Game
    setupMemoryGame() {
        const memoryGame = document.querySelector('.memory-game');
        if (!memoryGame) return;

        const cards = [
            '🐶', '🐱', '🐭', '🐹', '🐰', '🦊', '🐻', '🐼',
            '🐶', '🐱', '🐭', '🐹', '🐰', '🦊', '🐻', '🐼'
        ];

        let flippedCards = [];
        let matchedPairs = 0;

        // Shuffle cards
        cards.sort(() => Math.random() - 0.5);

        // Create card elements
        cards.forEach((emoji, index) => {
            const card = document.createElement('div');
            card.className = 'memory-card';
            card.dataset.value = emoji;
            card.innerHTML = '<div class="card-front">?</div><div class="card-back">' + emoji + '</div>';
            card.addEventListener('click', () => this.flipCard(card));
            memoryGame.appendChild(card);
        });
    }

    flipCard(card) {
        if (flippedCards.length < 2 && !card.classList.contains('flipped')) {
            card.classList.add('flipped');
            flippedCards.push(card);

            if (flippedCards.length === 2) {
                setTimeout(() => this.checkMatch(), 1000);
            }
        }
    }

    checkMatch() {
        const [card1, card2] = flippedCards;
        if (card1.dataset.value === card2.dataset.value) {
            matchedPairs++;
            this.updateScore(10);
            if (matchedPairs === 8) {
                this.showSuccessMessage('Memory Game Completed!');
            }
        } else {
            card1.classList.remove('flipped');
            card2.classList.remove('flipped');
        }
        flippedCards = [];
    }

    // Math Game
    setupMathGame() {
        const mathGame = document.querySelector('.math-game');
        if (!mathGame) return;

        const generateProblem = () => {
            const num1 = Math.floor(Math.random() * 10) + 1;
            const num2 = Math.floor(Math.random() * 10) + 1;
            const operators = ['+', '-', '*'];
            const operator = operators[Math.floor(Math.random() * operators.length)];
            
            let answer;
            switch(operator) {
                case '+': answer = num1 + num2; break;
                case '-': answer = num1 - num2; break;
                case '*': answer = num1 * num2; break;
            }

            return { problem: `${num1} ${operator} ${num2}`, answer };
        };

        const problem = generateProblem();
        mathGame.innerHTML = `
            <div class="problem">${problem.problem} = ?</div>
            <input type="number" class="answer-input">
            <button class="check-answer">Check Answer</button>
        `;

        const checkButton = mathGame.querySelector('.check-answer');
        const input = mathGame.querySelector('.answer-input');

        checkButton.addEventListener('click', () => {
            const userAnswer = parseInt(input.value);
            if (userAnswer === problem.answer) {
                this.updateScore(5);
                this.showSuccessMessage('Correct!');
                const newProblem = generateProblem();
                mathGame.querySelector('.problem').textContent = newProblem.problem;
                input.value = '';
            } else {
                this.showErrorMessage('Try again!');
            }
        });
    }

    // Word Game
    setupWordGame() {
        const wordGame = document.querySelector('.word-game');
        if (!wordGame) return;

        const words = ['apple', 'banana', 'orange', 'grape', 'strawberry'];
        const currentWord = words[Math.floor(Math.random() * words.length)];
        const scrambledWord = this.scrambleWord(currentWord);

        wordGame.innerHTML = `
            <div class="scrambled-word">${scrambledWord}</div>
            <input type="text" class="word-input" placeholder="Unscramble the word">
            <button class="check-word">Check Word</button>
        `;

        const checkButton = wordGame.querySelector('.check-word');
        const input = wordGame.querySelector('.word-input');

        checkButton.addEventListener('click', () => {
            if (input.value.toLowerCase() === currentWord) {
                this.updateScore(15);
                this.showSuccessMessage('Correct!');
                const newWord = words[Math.floor(Math.random() * words.length)];
                wordGame.querySelector('.scrambled-word').textContent = this.scrambleWord(newWord);
                input.value = '';
            } else {
                this.showErrorMessage('Try again!');
            }
        });
    }

    scrambleWord(word) {
        return word.split('').sort(() => Math.random() - 0.5).join('');
    }

    // Puzzle Game
    setupPuzzleGame() {
        const puzzleGame = document.querySelector('.puzzle-game');
        if (!puzzleGame) return;

        const puzzle = [
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 0]
        ];

        const createPuzzleBoard = () => {
            puzzleGame.innerHTML = '';
            puzzle.forEach((row, i) => {
                row.forEach((cell, j) => {
                    if (cell !== 0) {
                        const tile = document.createElement('div');
                        tile.className = 'puzzle-tile';
                        tile.textContent = cell;
                        tile.dataset.row = i;
                        tile.dataset.col = j;
                        tile.addEventListener('click', () => this.moveTile(tile));
                        puzzleGame.appendChild(tile);
                    }
                });
            });
        };

        createPuzzleBoard();
    }

    moveTile(tile) {
        const row = parseInt(tile.dataset.row);
        const col = parseInt(tile.dataset.col);
        
        // Check if tile can move
        if (this.canMove(row, col)) {
            this.swapTiles(row, col);
            this.updatePuzzleBoard();
            if (this.isPuzzleSolved()) {
                this.updateScore(20);
                this.showSuccessMessage('Puzzle Solved!');
            }
        }
    }

    canMove(row, col) {
        // Check adjacent cells for empty space
        return (
            (row > 0 && puzzle[row-1][col] === 0) ||
            (row < 2 && puzzle[row+1][col] === 0) ||
            (col > 0 && puzzle[row][col-1] === 0) ||
            (col < 2 && puzzle[row][col+1] === 0)
        );
    }

    swapTiles(row, col) {
        // Find empty space and swap
        for (let i = 0; i < 3; i++) {
            for (let j = 0; j < 3; j++) {
                if (puzzle[i][j] === 0) {
                    puzzle[i][j] = puzzle[row][col];
                    puzzle[row][col] = 0;
                    return;
                }
            }
        }
    }

    isPuzzleSolved() {
        let count = 1;
        for (let i = 0; i < 3; i++) {
            for (let j = 0; j < 3; j++) {
                if (puzzle[i][j] !== count % 9) return false;
                count++;
            }
        }
        return true;
    }

    // Score System
    updateScore(points) {
        this.currentScore += points;
        this.updateScoreDisplay();
        this.saveHighScore();
    }

    updateScoreDisplay() {
        const scoreDisplay = document.querySelector('.score-display');
        if (scoreDisplay) {
            scoreDisplay.textContent = `Score: ${this.currentScore}`;
        }
    }

    saveHighScore() {
        if (this.currentUser) {
            if (!this.highScores[this.currentUser]) {
                this.highScores[this.currentUser] = 0;
            }
            if (this.currentScore > this.highScores[this.currentUser]) {
                this.highScores[this.currentUser] = this.currentScore;
                localStorage.setItem('highScores', JSON.stringify(this.highScores));
            }
        }
    }

    // Initialize the game system
    init() {
        this.initGames();
        this.updateScoreDisplay();
    }
}

// Initialize game system when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    const gameSystem = new GameSystem();
    gameSystem.init();
}); 