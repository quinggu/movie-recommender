<?php

namespace App\Tests\Application\Movie;

use App\Application\Movie\MovieRecommender;
use App\Infrastructure\Movie\InMemoryMovieRepository;
use PHPUnit\Framework\TestCase;

class MovieRecommenderTest extends TestCase
{
    private MovieRecommender $movieRecommender;

    protected function setUp(): void
    {
        $movieRepository = new InMemoryMovieRepository();
        $this->movieRecommender = new MovieRecommender($movieRepository);
    }

    public function testGetRandomMovies(): void
    {
        $movies = $this->movieRecommender->getRandomMovies();
        $this->assertCount(3, $movies);
    }

    public function testGetMoviesStartingWithWWithEvenLength(): void
    {
        $movies = $this->movieRecommender->getMoviesStartingWithWWithEvenLength();
        $this->assertCount(1, $movies);
        $this->assertEquals("Władca Pierścieni: Powrót króla", $movies[0]->getTitle());
    }

    public function testGetMoviesWithMultipleWords(): void
    {
        $movies = $this->movieRecommender->getMoviesWithMultipleWords();
        $this->assertGreaterThan(0, count($movies));
        foreach ($movies as $movie) {
            $this->assertTrue(str_word_count($movie->getTitle()) > 1);
        }
    }
}
