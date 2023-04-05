<?php declare(strict_types=1);

use App\PrimeFactors;
use PHPUnit\Framework\TestCase;

final class PrimeFactorsTest extends TestCase
{
    /**
     * @test
     * @dataProvider factors
     */
    function it_generates_prime_factors_for_1($number, $expected): void
    {
        $factors = new PrimeFactors;

        $this->assertEquals([], $factors->generate(1));
    }

    public static function factors()
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [6, [2, 3]],
            [7, [7]],
            [8, [2, 2, 2]],
            [100, [2, 2, 5, 5]],
        ];
    }
}
