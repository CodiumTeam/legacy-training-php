<?php

class TriviaTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function xxx()
    {
        $gameRunner = new \Trivia\GameRunner();
        srand(0);
        ob_start();

        $gameRunner->play();

        $output = ob_get_contents();
        ob_clean();
        $expected = file_get_contents('./golden.log');
        $this->assertEquals($expected, $output);
    }
}
