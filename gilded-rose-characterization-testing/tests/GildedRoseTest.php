<?php

namespace GildedRose\Test;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{

    /** @test */
    public function changeMe()
    {
        /** @var Item[] $items */
        $items = array(new Item("aName", 10, 20));
        $gildedRose = new GildedRose($items);

        $gildedRose->update_quality();

        $this->assertEquals("aName", $items[0]->name);
    }
}
