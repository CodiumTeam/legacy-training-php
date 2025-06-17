<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class TennisGameTest extends TestCase
{
    #[DataProvider('provideScores')]
    public function test_scores(int $score1, int $score2, string $expectedResult): void
    {
        $game = new TennisGame('player1', 'player2');

        $highestScore = max($score1, $score2);
        for ($i = 0; $i < $highestScore; $i++) {
            if ($i < $score1) {

                $game->wonPoint("player1");
            }
            if ($i < $score2) {
                $game->wonPoint("player2");
            }
        }

        self::assertSame($expectedResult, $game->getScore());
    }

    public static function provideScores(): iterable
    {
        yield '0-0' => [0, 0, "Love-All"];
        yield '1-1' => [1, 1, "Fifteen-All"];
        yield '2-2' => [2, 2, "Thirty-All"];
        yield '3-3' => [3, 3, "Deuce"];
        yield '4-4' => [4, 4, "Deuce"];
        yield '1-0' => [1, 0, "Fifteen-Love"];
        yield '0-1' => [0, 1, "Love-Fifteen"];
        yield '2-0' => [2, 0, "Thirty-Love"];
        yield '0-2' => [0, 2, "Love-Thirty"];
        yield '3-0' => [3, 0, "Forty-Love"];
        yield '0-3' => [0, 3, "Love-Forty"];
        yield '4-0' => [4, 0, "Win for player1"];
        yield '0-4' => [0, 4, "Win for player2"];
        yield '2-1' => [2, 1, "Thirty-Fifteen"];
        yield '1-2' => [1, 2, "Fifteen-Thirty"];
        yield '3-1' => [3, 1, "Forty-Fifteen"];
        yield '1-3' => [1, 3, "Fifteen-Forty"];
        yield '4-1' => [4, 1, "Win for player1"];
        yield '1-4' => [1, 4, "Win for player2"];
        yield '3-2' => [3, 2, "Forty-Thirty"];
        yield '2-3' => [2, 3, "Thirty-Forty"];
        yield '4-2' => [4, 2, "Win for player1"];
        yield '2-4' => [2, 4, "Win for player2"];
        yield '4-3' => [4, 3, "Advantage player1"];
        yield '3-4' => [3, 4, "Advantage player2"];
        yield '5-4' => [5, 4, "Advantage player1"];
        yield '4-5' => [4, 5, "Advantage player2"];
        yield '15-14' => [15, 14, "Advantage player1"];
        yield '14-15' => [14, 15, "Advantage player2"];
        yield '6-4' => [6, 4, "Win for player1"];
        yield '4-6' => [4, 6, "Win for player2"];
        yield '16-14' => [16, 14, "Win for player1"];
        yield '14-16' => [14, 16, "Win for player2"];
    }
}
