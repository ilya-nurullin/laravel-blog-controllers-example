<?php

namespace App\VO;

use Illuminate\Support\Str;

class DatetimeIntervalVO
{
    public function __construct(protected string $from, protected $to)
    {
        if ($from > $to)
            throw new \Exception('Weak password');

    }

    public function getFrom()
    {
        return $this->from;
    }

    public function getTo()
    {
        return $this->to;
    }
}
