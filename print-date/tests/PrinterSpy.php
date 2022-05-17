<?php

namespace PrintDate\Test;

use PrintDate\Printer;

class PrinterSpy extends Printer
{
    private string $printedLine = 'Not called';

    public function __construct()
    {
    }

    public function printLine(string $line)
    {
     $this->printedLine = $line;
    }

    public function calledWith(): string
    {
        return $this->printedLine;
    }
}
