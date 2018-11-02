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

    public function testCanRenderAnItem(): void
    {
        $item = new Item([
            'name' => 'watch',
            'value' => 3,
            'volume' => 2,
        ]);
        $expectedRender = <<<EOT
<ul class="knp__item">
    <li>watch</li>
    <li>3 €</li>
    <li>2 L</li>
</ul>
EOT;
        $this->assertEquals(
            $item->render(), $expectedRender
        );
    }
}
