<?php

namespace PrintDate\Test;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use PrintDate\Calendar;
use PrintDate\PrintDate;
use PrintDate\Printer;
use Prophecy\PhpUnit\ProphecyTrait;

class PrintDateTest extends TestCase
{
    use ProphecyTrait;

    #[Test]
    public function it_test_system_methods(): void
    {
        $printDate = new PrintDate(new Printer(), new Calendar());

        // uncomment this
        //$printDate->printCurrentDate();

        // I don't know how to test it
        $this->assertTrue(true);
    }
}