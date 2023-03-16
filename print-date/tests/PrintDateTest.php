<?php

namespace PrintDate\Test;

use PHPUnit\Framework\TestCase;
use PrintDate\Calendar;
use PrintDate\PrintDate;
use PrintDate\Printer;
use Prophecy\PhpUnit\ProphecyTrait;

class PrintDateTest extends TestCase
{
    use ProphecyTrait;

    /** @test */
    public function it_test_system_methods()
    {
        $printDate = new PrintDate(new Printer(), new Calendar());

        $printDate->printCurrentDate();

        // I don't know how to test it
    }
}