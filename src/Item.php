<?php
declare (strict_types = 1);

namespace App;

class Item
{
    private $value;
    private $volume;

    /**
     * An Item is a value and a volume
     * @param array $opts argument passed as an array
     * @param int $opts.value the value of the item
     * @param int $opts.volume the volume of the item
     */
    public function __construct($opts)
    {
        $this->value = $opts['value'];
        $this->volume = $opts['volume'];
    }
}
