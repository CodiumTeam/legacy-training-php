<?php

namespace GildedRose;

$vendor = getenv("COMPOSER_VENDOR_DIR") ?: (__DIR__ . '/../vendor');
require $vendor . '/autoload.php';

class Main
{
    public static function run()
    {

    }
}

Main::run();