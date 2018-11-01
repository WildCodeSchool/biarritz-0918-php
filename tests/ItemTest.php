<?php
declare (strict_types = 1);

use App\Item;
use PHPUnit\Framework\TestCase;

final class ItemTest extends TestCase
{
    public function testCanInstanciateAnItemWithoutCrashing(): void
    {
        $item = new Item([
            'name' => 'watch',
            'value' => 3,
            'volume' => 2,
        ]);
        $this->assertInstanceOf(
            Item::class,
            $item
        );
    }
}
