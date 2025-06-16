<?php

namespace PrintDate;

class PrintDate
{

    public function __construct(private readonly  Printer $printer, private readonly Calendar $calendar)
    {
    }

    public function printCurrentDate(): void
    {
        $now = $this->calendar->now();
        $this->printer->printLine($now);
    }
}