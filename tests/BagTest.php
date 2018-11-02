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

    public function testCanRenderABag(): void
    {
        $bag = new Bag(10);
        $expectedRender = <<<EOT
<ul class="knp__bag">
    <li>10 L</li>
</ul>
EOT;
        $this->assertEquals(
            $bag->render(), $expectedRender
        );
    }
}
