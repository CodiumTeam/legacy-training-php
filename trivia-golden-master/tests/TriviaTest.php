<?php
declare(strict_types=1);

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class TriviaTest extends TestCase
{
    #[Test]
    public function xxx(): void
    {
        $this->assertEquals(true, true);
    }
}