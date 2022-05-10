<?php

use App\BowlingGame;
use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    /** @test */
    function itScoresaGutterGameAsZero()
    {
        $game = new BowlingGame();

        foreach (range(1, 20) as $roll) {
            $game->roll(0);
        }
        $this->assertSame(0, $game->score());
    }

    /** @test */
    function itScoresAllOne()
    {
        $game = new BowlingGame();

        foreach (range(1, 20) as $roll) {
            $game->roll(1);
        }
        $this->assertSame(20, $game->score());
    }

    /** @test */
    function itAwardsAOneRollBonusForEverySpare()
    {
        $game = new BowlingGame();

        $game->roll(5);
        $game->roll(5);

        $game->roll(8);

        foreach (range(1, 17) as $roll) {
            $game->roll(0);
        }
        $this->assertSame(26, $game->score());
    }

    /** @test */
    function itAwardsATwoRollBonusForEverySpare()
    {
        $game = new BowlingGame();

        $game->roll(10);

        $game->roll(5);
        $game->roll(2);

        foreach (range(1, 16) as $roll) {
            $game->roll(0);
        }
        $this->assertSame(24, $game->score());
    }

    /** @test */
    function aSpareOnTheFinalFrameGrantsOneExtraBalls()
    {
        $game = new BowlingGame();

        foreach (range(1, 18) as $roll) {
            $game->roll(0);
        }

        $game->roll(5);
        $game->roll(5);

        $game->roll(5);

        $this->assertSame(15, $game->score());
    }

    /** @test */
    function aStrikeOnTheFinalFrameGrantsTwoExtraBalls()
    {
        $game = new BowlingGame();

        foreach (range(1, 18) as $roll) {
            $game->roll(0);
        }

        $game->roll(10);

        $game->roll(10);
        $game->roll(10);

        $this->assertSame(30, $game->score());
    }

    /** @test */
    function rollAPerfectGame()
    {
        $game = new BowlingGame();

        foreach (range(1, 12) as $roll) {
            $game->roll(10);
        }

        $this->assertSame(300, $game->score());
    }
}
