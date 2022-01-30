<?php

use PHPUnit\Framework\TestCase;

final class SubmarineTest extends TestCase
{
    public function testFloatOrDiveFunction()
    {
        $submarine = new Submarine();
        $submarine->setCurrentDepth(100);
        $submarine->setMaxDepth(300);

        $submarine->floatOrDive('dive', 50);

        $this->assertEquals(150, $submarine->getCurrentDepth());

        $submarine->floatOrDive('float', 50);

        $this->assertEquals(100, $submarine->getCurrentDepth());

        $submarine->floatOrDive('float');

        $this->assertIsNumeric($submarine->getCurrentDepth());
    }
}