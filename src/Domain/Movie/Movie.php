<?php

namespace App\Domain\Movie;

readonly class Movie
{
    public function __construct(private string $title)
    {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function hasEvenLength(): bool
    {
        return mb_strlen($this->title) % 2 === 0;
    }

    public function startsWithW(): bool
    {
        return strpos($this->title, 'W') === 0;
    }

    public function hasMultipleWords(): bool
    {
        return str_word_count($this->title) > 1;
    }
}