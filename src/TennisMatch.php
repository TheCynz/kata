<?php

namespace App;

class TennisMatch
{
    protected $playerOnePoints = 0;
    protected $playerTwoPoints = 0;



    public function score()
    {
        if ($this->hasWinner()) {
            return 'Winner: ' . $this->leader();
        }

        if ($this->hasAdvantage()){
            return 'Advantage: ' . $this->leader();
        }

        //check for deuce
        if ($this->isDeuce()) {
            return 'deuce';
        }

        // def
        return sprintf(
            "%s-%s",
            $this->pointsToTerm($this->playerOnePoints),
            $this->pointsToTerm($this->playerTwoPoints),
        );
    }



    public function pointToPlayerOne()
    {
        $this->playerOnePoints++;
    }

    public function pointToPlayerTwo()
    {
        $this->playerTwoPoints++;
    }

    public function pointsToTerm($points)
    {
        switch ($points) {
            case 0:
                return 'love';
            case 1:
                return 'fifteen';
            case 2:
                return 'thirty';
            case 3:
                return 'forty';
        }
    }

    /**
     * @return bool
     */
    public function hasWinner(): bool
    {
        if ($this->playerOnePoints > 3 && ($this->playerOnePoints >= $this->playerTwoPoints + 2)) {
            return true;
        }

        if ($this->playerTwoPoints > 3 && ($this->playerTwoPoints >= $this->playerOnePoints + 2)) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function leader(): string
    {
        return $this->playerOnePoints > $this->playerTwoPoints
            ? 'Player 1'
            : 'Player 2';
    }

    /**
     * @return bool
     */
    public function isDeuce(): bool
    {
        return $this->playerOnePoints >= 3 && $this->playerTwoPoints >= 3 && $this->playerOnePoints === $this->playerTwoPoints;
    }


    /**
     * @return bool
     */
    public function hasAdvantage(): bool
    {
        if ($this->playerOnePoints >= 3 && $this->playerTwoPoints >=3 && $this->playerOnePoints > $this->playerTwoPoints) {
            return true;
        }

        if ($this->playerTwoPoints >= 3 && $this->playerOnePoints >=3 && $this->playerTwoPoints > $this->playerOnePoints)  {
            return true;
        }

        return false;
    }
}
