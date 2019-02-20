<?php

namespace PrintDate\Test;

use PHPUnit\Framework\TestCase;
use PrintDate\PrintDate;

class PrintDateTest extends TestCase
{
    /** @test */
    public function it_test_system_methods()
    {
        $printDate = new PrintDate();

        $printDate->printCurrentDate();

        // I don't know how to test it
    }
}