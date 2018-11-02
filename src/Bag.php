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

    public function render(): string
    {
        $volume = $this->volume;
        return <<<EOT
<ul class="knp__bag">
    <li>${volume} L</li>
</ul>
EOT;
    }
}
