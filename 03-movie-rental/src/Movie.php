<?php

class Movie
{
    private MovieType $type;
    private string $title;

    public function __construct(string $title, MovieType $type)
    {
        $this->title = $title;
        $this->type = $type;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getType(): MovieType
    {
        return $this->type;
    }
}
