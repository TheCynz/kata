<?php

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /** @test */
    function it_returns_fizz_for_multiples_of_three()
    {
        foreach ([3,6,9,12] as $nuber) {
            $this->assertEquals('fizz', FizzBuzz::convert($nuber));
        }
    }

    /** @test */
    function it_returns_buzz_for_multiples_of_five()
    {
        foreach ([5,10,20,25,35,40] as $nuber) {
            $this->assertEquals('buzz', FizzBuzz::convert($nuber));
        }
    }

    /** @test */
    function it_returns_fizzbuzz_for_multiples_of_three_and_five()
    {
        foreach ([15, 30, 45, 60] as $nuber) {
            $this->assertEquals('fizzbuzz', FizzBuzz::convert($nuber));
        }
    }

    /** @test */
    function it_returns_the_origional_number_if_notDivisible_by_three_or_five()
    {
        foreach ([1,2,4,7,8,11] as $nuber) {
            $this->assertEquals($nuber, FizzBuzz::convert($nuber));
        }
    }

}
