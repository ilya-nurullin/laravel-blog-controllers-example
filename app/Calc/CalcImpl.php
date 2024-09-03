<?php

namespace App\Calc;

class CalcImpl implements ICalc
{
    private $_res = 0;

    public function sum(int $a, int $b)
    {
        $res = $a + $b;
        $this->_res += $res;

        return $this;
    }

    public function res(): int
    {
        return $this->_res;
    }
}
