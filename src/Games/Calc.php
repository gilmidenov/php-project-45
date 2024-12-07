<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\playGame;

const DESCRIPTION = 'What is the result of the expression?';

function play()
{
    $getRoundData = function () {
        $operators = ['+', '-', '*'];
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $operator = $operators[array_rand($operators)];

        $question = "$number1 $operator $number2";
        $correctAnswer = calculate($number1, $number2, $operator);

        return [$question, (string)$correctAnswer];
    };

    playGame(DESCRIPTION, $getRoundData);
}

function calculate(int $num1, int $num2, string $operator): int
{
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            throw new \Exception("Unknown operator: $operator");
    }
}
