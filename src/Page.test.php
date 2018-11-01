<?php
declare (strict_types = 1);

use App\Page;
use PHPUnit\Framework\TestCase;

final class PageTest extends TestCase
{
    public function testCanInstanciateAPage(): void
    {
        $page = new Page('Hello');
        $this->assertInstanceOf(
            Page::class,
            $page
        );
    }
}
