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
        $this->printer->printLine($this->calendar->now());
    }
}