<?php
class Article
{
    private $isPublished;
    private $id;
    public $title;
    public $body;
    private $createdAt;
    private $updatedAt;

    public function __toString()
    {
        return "Article($this->id): $this->title";
    }
}
