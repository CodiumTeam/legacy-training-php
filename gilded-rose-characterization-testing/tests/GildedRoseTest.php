<?php

namespace GildedRose\Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{

    /**
     * @test
     * @dataProvider productNamesThatDecreaseQuality
     */
    public function the_minimum_quality_is_0(string $name): void
    {
        /** @var Item[] $items */
        $items = [
            new Item($name, 10, 0),
        ];
        $gildedRose = new GildedRose($items);

        $gildedRose->update_quality();

        $this->assertEquals(0, $items[0]->quality, $name);
    }

    public function productNamesThatDecreaseQuality(): array
    {
        return [
            ["Cookies"],
            ["Pencil"],
            ["Book"],
        ];
    }
}
