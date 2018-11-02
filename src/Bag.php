<?php

declare (strict_types = 1);

namespace App;

class Bag
{
    public $volume;

    public function __construct(int $volume)
    {
        $this->volume = $volume;
    }
}
