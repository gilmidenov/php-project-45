<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;

function play()
{
    $description = 'What number is missing in the progression?';
    $getRoundData = function () {
        $progressionLength = rand(5, 10); // Генерация длины прогрессии
        $start = rand(1, 20); // Начало прогрессии
        $step = rand(2, 10); // Шаг прогрессии

        $progression = buildProgression($start, $step, $progressionLength);
        $hiddenIndex = rand(0, $progressionLength - 1);

        $correctAnswer = (string)$progression[$hiddenIndex]; // Правильный ответ
        $progression[$hiddenIndex] = '..'; // Заменяем скрытый элемент

        $question = implode(' ', $progression);

        return [$question, $correctAnswer];
    };

    playGame($description, $getRoundData);
}

function buildProgression(int $start, int $step, int $length): array
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }
    return $progression;
}
