<?php

namespace PrintDate\Test;

use PrintDate\Calendar;

class CalendarStub extends Calendar
{
    private string $now;

    public function __construct(string $now)
    {
        $this->now = $now;
    }

    public function now()
    {
        return $this->now;
    }
}
