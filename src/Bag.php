<?php

declare (strict_types = 1);

namespace App;

class Bag
{
    public $value;
    public $volume;

    public function __construct(int $volume)
    {
        $this->value = 0;
        $this->volume = $volume;
    }
}
