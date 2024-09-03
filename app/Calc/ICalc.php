<?php

namespace App\Calc;

interface ICalc
{
    public function sum(int $a, int $b);

    public function res(): int;
}
