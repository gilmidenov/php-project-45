<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\playGame;

function play()
{
    $description = 'Find the greatest common divisor of given numbers.';
    $getRoundData = function () {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);

        $question = "$number1 $number2";
        $correctAnswer = gcd($number1, $number2);

        return [$question, (string)$correctAnswer];
    };

    playGame($description, $getRoundData);
}

function gcd(int $a, int $b): int
{
    while ($b !== 0) {
        [$a, $b] = [$b, $a % $b];
    }
    return $a;
}
