<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\playGame;

function play()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $getRoundData = function () {
        $number = rand(1, 100);

        $question = (string)$number;
        $correctAnswer = isPrime($number) ? 'yes' : 'no';

        return [$question, $correctAnswer];
    };

    playGame($description, $getRoundData);
}

function isPrime(int $number): bool
{
    if ($number <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
