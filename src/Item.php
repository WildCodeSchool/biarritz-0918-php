<?php
declare (strict_types = 1);

namespace App;

class Item
{
    public $value;
    public $volume;

    /**
     * An Item is a value and a volume and a name
     * @param array $opts argument passed as an array
     * @param string $opts.name the value of the item
     * @param int $opts.value the value of the item
     * @param int $opts.volume the volume of the item
     */
    public function __construct(array $opts)
    {
        $this->name = $opts['name'];
        $this->value = $opts['value'];
        $this->volume = $opts['volume'];
    }

    public function render()
    {
        $name = $this->name;
        $value = $this->value;
        $volume = $this->volume;
        return <<<EOT
<ul class="knp__item">
    <li>${name}</li>
    <li>${value} €</li>
    <li>${volume} L</li>
</ul>
EOT;
    }
}
