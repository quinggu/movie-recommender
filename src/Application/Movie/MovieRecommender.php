<?php

namespace App\Application\Movie;

use App\Domain\Movie\MovieRepositoryInterface;

readonly class MovieRecommender
{

    public function __construct(private MovieRepositoryInterface $movieRepository)
    {}

    public function getRandomMovies(): array
    {
        $movies = $this->movieRepository->findAll();
        shuffle($movies);

        return array_slice($movies, 0, 3);
    }

    public function getMoviesStartingWithWWithEvenLength(): array
    {
        return array_filter($this->movieRepository->findAll(), function ($movie) {
            return $movie->startsWithW() && $movie->hasEvenLength();
        });
    }

    public function getMoviesWithMultipleWords(): array
    {
        return array_filter($this->movieRepository->findAll(), function ($movie) {
            return $movie->hasMultipleWords();
        });
    }
}