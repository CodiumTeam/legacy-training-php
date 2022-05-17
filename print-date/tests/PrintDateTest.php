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
        $printerProphecy = $this->prophesize(Printer::class);
        $calendarProphecy = $this->prophesize(Calendar::class);
        $calendarProphecy->now()->willReturn('2022/05/12');
        $printDate = new PrintDate($printerProphecy->reveal(), $calendarProphecy->reveal());

        $printDate->printCurrentDate();

        $printerProphecy->printLine('2022/05/12')->shouldHaveBeenCalled();
    }

    /** @test */
    public function xxx()
    {
        $calendarStub = new CalendarStub("2002/01/01");
        $printerSpy = new PrinterSpy();
        $printDate = new PrintDate($printerSpy, $calendarStub);

        $printDate->printCurrentDate();


        $this->assertEquals("2002/01/01", $printerSpy->calledWith());
    }
}
