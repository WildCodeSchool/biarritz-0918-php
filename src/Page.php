<?php
declare (strict_types = 1);

namespace App;

class Page
{
    private $title = '';
    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
