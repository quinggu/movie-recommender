<?php

namespace App\Domain\Movie;

interface MovieRepositoryInterface
{
    public function findAll(): array;
}