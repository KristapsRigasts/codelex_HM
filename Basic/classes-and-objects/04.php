<?php
class Movie
{
    private string $title;
    private string $studio;
    private string $rating;


    public function __construct($title, $studio, $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStudio(): string
    {
        return $this->studio;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

}


class PickMovies
{
    private array $movies=[];

    public function addMovie(Movie $movies)
    {
        $this->movies[] = $movies;
    }
    public function getPG(): array
    {
        $withRating = [];
        foreach ($this->movies as $movie)
        {

            if($movie->getRating() == "PG")
            {
                $withRating[]= $movie;
            }
        } return $withRating;
    }
}
$movies = new PickMovies();
$movies->addMovie(new Movie('Casino Royale', 'Eon Productions', 'PG13'));
$movies->addMovie(new Movie('Glass','Buena Vista International', 'PG13'));
$movies->addMovie(new Movie('Spider-Man: Into the Spider-Verse','Columbia Pictures', 'PG'));

foreach ($movies->getPG() as $movie)
{
    echo "Title: {$movie->getTitle()}, the studio {$movie->getStudio()}, rating {$movie->getRating()}." . PHP_EOL;
}
