<?php

namespace App\Entity;

class Article{
    private $id;
    private $title;
    private $content;
    private $categoryid;
    private $created;

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    public function getContent(): string
    {
        return $this->content;
    }
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }
    public function getCategoryid()
    {
        return $this->categoryid;
    }
    public function setCategoryid($categoryid): self
    {
        $this->categoryid = $categoryid;
        return $this;
    }
    public function getCreated(): DateTime
    {
        return $this->content;
    }
    public function setCreated(DateTime $created): self
    {
        $this->created = $created;
        return $this;
    }
}