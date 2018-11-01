<?php
declare (strict_types = 1);

use App\Bag;
use PHPUnit\Framework\TestCase;

final class BagTest extends TestCase
{
    public function testCanInstanciateABagWithoutCrashing(): void
    {
        $this->assertInstanceOf(
            Bag::class,
            new Bag(10)
        );
    }
}
