<?php

namespace App;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    protected $delimiter = ",|\n";

    public function add(string $numbers)
    {
        if (! $numbers) {
            return 0;
        }

        $numbers = $this->parseString($numbers);

        $this->disallowingNegatives($numbers);

        return array_sum(
            $this->ignoreGreaterThan1000($numbers)
        );
    }

    protected function parseString(string $numbers): array
    {
        $customeDelimiter = '\/\/(.)\n';

        if (preg_match("/{$customeDelimiter}/", $numbers, $matches)) {
            $this->delimiter = $matches[1];

            $numbers = str_replace($matches[0], '', $numbers);
        }

        return preg_split("/{$this->delimiter}/", $numbers);
    }

    protected function disallowingNegatives(array $numbers): void
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new \Exception('Negative numbers are not allowed.');
            }
        }
    }

    protected function ignoreGreaterThan1000(array $numbers): array
    {
        return array_filter(
            $numbers, fn($number) => $number <= self::MAX_NUMBER_ALLOWED
        );
    }
}
