<?php

namespace GildedRose\Test;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\Attributes\CoversNamespace;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function test_changeMe()
    {
        /** @var Item[] $items */
        $items = array(new Item("aName", 10, 20));
        $gildedRose = new GildedRose($items);

        $gildedRose->update_quality();

        $this->assertEquals("aName", $items[0]->name);
    }
}
