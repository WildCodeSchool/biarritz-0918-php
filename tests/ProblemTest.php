<?php
declare (strict_types = 1);

use App\Bag;
use App\Item;
use App\Problem;
use PHPUnit\Framework\TestCase;

function createItem(string $name, int $volume, int $value): Item
{
    return new Item([
        'name' => $name,
        'value' => $value,
        'volume' => $volume,
    ]);
}

final class ProblemTest extends TestCase
{
    public function testSolveTheKnapsackProblem(): void
    {
        $bottle = createItem('bottle', 2, 4);
        $pen = createItem('pen', 1, 3);
        $book = createItem('book', 6, 8);
        $gold = createItem('gold', 3, 6);
        $items = array($bottle, $pen, $book, $gold);

        $this->assertArraySubset(
            array($bottle, $pen, $book),
            Problem::solve(['items' => $items, 'bag' => new Bag(9)])
        );
    }

}
