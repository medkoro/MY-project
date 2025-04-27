<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a sample quiz
        $quiz = Quiz::create([
            'title' => 'Animals Quiz for Kids',
            'description' => 'Test your knowledge about animals with this fun quiz!',
            'category' => 'Animals',
            'difficulty' => 1, // Easy difficulty (1-5 scale)
            'is_active' => true,
        ]);

        // Add questions to the quiz
        Question::create([
            'quiz_id' => $quiz->id,
            'question_text' => 'Which animal is known as the king of the jungle?',
            'option_a' => 'Tiger',
            'option_b' => 'Lion',
            'option_c' => 'Elephant',
            'option_d' => 'Giraffe',
            'correct_answer' => 'b',
            'points' => 10,
        ]);

        Question::create([
            'quiz_id' => $quiz->id,
            'question_text' => 'Which animal has black and white stripes?',
            'option_a' => 'Zebra',
            'option_b' => 'Panda',
            'option_c' => 'Tiger',
            'option_d' => 'Cow',
            'correct_answer' => 'a',
            'points' => 10,
        ]);

        Question::create([
            'quiz_id' => $quiz->id,
            'question_text' => 'Which animal has a very long neck?',
            'option_a' => 'Elephant',
            'option_b' => 'Snake',
            'option_c' => 'Giraffe',
            'option_d' => 'Kangaroo',
            'correct_answer' => 'c',
            'points' => 10,
        ]);

        // Create another quiz
        $mathQuiz = Quiz::create([
            'title' => 'Basic Math Quiz',
            'description' => 'Practice your basic math skills!',
            'category' => 'Mathematics',
            'difficulty' => 1, // Easy difficulty (1-5 scale)
            'is_active' => true,
        ]);

        // Add questions to the math quiz
        Question::create([
            'quiz_id' => $mathQuiz->id,
            'question_text' => 'What is 5 + 3?',
            'option_a' => '7',
            'option_b' => '8',
            'option_c' => '9',
            'option_d' => '10',
            'correct_answer' => 'b',
            'points' => 5,
        ]);

        Question::create([
            'quiz_id' => $mathQuiz->id,
            'question_text' => 'What is 10 - 4?',
            'option_a' => '4',
            'option_b' => '5',
            'option_c' => '6',
            'option_d' => '7',
            'correct_answer' => 'c',
            'points' => 5,
        ]);

        Question::create([
            'quiz_id' => $mathQuiz->id,
            'question_text' => 'What is 3 × 4?',
            'option_a' => '7',
            'option_b' => '10',
            'option_c' => '12',
            'option_d' => '15',
            'correct_answer' => 'c',
            'points' => 5,
        ]);
    }
}
