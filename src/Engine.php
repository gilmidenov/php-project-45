<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function playGame(string $description, callable $getRoundData)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $correctAnswer] = $getRoundData();

        line("Question: %s", $question);
        $answer = prompt('Your answer');

        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $name);
}
