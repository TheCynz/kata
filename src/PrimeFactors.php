<?php

namespace App;

class PrimeFactors
{
    /**
     * @param $number
     * @return array
     */
    public function generate($number): array
    {
        $factors = [];

        for($divisor = 2; $number > 1; $divisor++) {
            for (; $number % $divisor == 0; $number /= $divisor) {
                $factors[] = $divisor;
            }
        }

        return  $factors;
    }
}
