<?php
declare (strict_types = 1);

use App\Bag;
use App\Item;
use PHPUnit\Framework\TestCase;

function createItem(int $volume, int $value): Item
{
    return new Item([
        'value' => $value,
        'volume' => $volume,
    ]);
}

final class ProblemTest extends TestCase
{
    public function testSolveTheKnapsackProblem(): void
    {
        $items = array(
            'bottle' => createItem(2, 4),
            'pen' => createItem(1, 3),
            'book' => createItem(5, 8),
            'gold' => createItem(3, 6),
        );

        $this->assertArraySubset(
            Problem::solve(['items' => $items, 'bag' => new Bag(9)]),
            array('pen' => $items['pen'], 'gold' => $items['gold'])
        );
    }
}
