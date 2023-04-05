<?php

namespace App;

class primeFactors
{
    public function generate($number)
    {
        $factors = [];

        for ($divisor = 1; $number > 1; $divisor++) {
            for (; $number % $divisor === 0; $number /= $divisor) {
                $factors[] = $divisor;
            }
        }

        return $factors;        
    }
}
