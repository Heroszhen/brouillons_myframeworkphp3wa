<?php

namespace App\Entity;

class Category{
    private $id;
    private $title;
    private $created;

    public function getId(): int
    {
        return $this->id;
    }
    public function setId($id): self
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