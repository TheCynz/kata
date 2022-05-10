<?php

namespace App;

use Exception;

const MAX_NUMBER_ALLOWED = 1000;
class StringCalculator
{
    protected string $delimiter = ",|\n";
    /**
     * @throws Exception
     */
    public function add(string $numbers)
    {
        $numbers = $this->parseString($numbers);

        $numbers = $this
            ->disallowNegativenumbers($numbers)
            ->ignoreGreaterThan1000($numbers);


        return array_sum($numbers);
    }


    public function disallowNegativenumbers($numbers): StringCalculator
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new Exception('Negative numbers are disallowed');
            }
        }
        return $this;
    }


    /**
     * @param $numbers
     * @return array
     */
    public function ignoreGreaterThan1000($numbers): array
    {
        return array_filter($numbers, fn($number) => $number <= MAX_NUMBER_ALLOWED);
    }

    public function parseString(string $numbers)
    {
        $customDelimiter = '\/\/(.)\n';
        if (preg_match("/{$customDelimiter}/", $numbers, $matches)) {
            $this->delimiter = $matches[1];

            $numbers = str_replace($matches[0], '', $numbers);
        }

        return  preg_split("/{$this->delimiter}/", $numbers);
    }
}
