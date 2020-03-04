<?php

namespace PrintDate;

class PrintDate
{
    private $calendar;
    private $printer;

    public function __construct(Printer $printer, Calendar $calendar)
    {
        $this->printer = $printer;
        $this->calendar = $calendar;
    }

    public function printCurrentDate()
    {
        $now = $this->calendar->now();
        $this->printer->printLine($now);
    }
}