<?php

require_once '10.php';

class VideoStoreTest
{
    public function addMoviesToTest(): void
    {
        $videoStoreTest = new VideoStore();
        $videoStoreTest->addVideoToTheStore(new Video('The Matrix'));
        $videoStoreTest->addVideoToTheStore(new Video('Godfather II'));
        $videoStoreTest->addVideoToTheStore(new Video('Star Wars Episode IV: A New Hope'));

        echo 'Add and display movies:'. PHP_EOL;

        foreach ($videoStoreTest->getVideoStore() as $index => $video)
        {
        echo "[{$index}] {$video->getTitle()} | rating: {$video->getRating()} | {$video->getCondition()}" . PHP_EOL;
        }
        echo PHP_EOL;

    }

    public function giveSeveralRatings(): void
    {
        $videoStoreTest = new VideoStore();
        $videoStoreTest->addVideoToTheStore(new Video('The Matrix'));
        $videoStoreTest->addVideoToTheStore(new Video('Godfather II'));
        $videoStoreTest->addVideoToTheStore(new Video('Star Wars Episode IV: A New Hope'));

        $videoStoreTest->rateAMovie($videoStoreTest->getVideoStore()[0],8);
        $videoStoreTest->rateAMovie($videoStoreTest->getVideoStore()[0],7);
        $videoStoreTest->rateAMovie($videoStoreTest->getVideoStore()[0],6);
        $videoStoreTest->rateAMovie($videoStoreTest->getVideoStore()[1],5);
        $videoStoreTest->rateAMovie($videoStoreTest->getVideoStore()[1],4);
        $videoStoreTest->rateAMovie($videoStoreTest->getVideoStore()[1],2);
        $videoStoreTest->rateAMovie($videoStoreTest->getVideoStore()[2],1);

        echo 'Add several ratings:'. PHP_EOL;

        foreach ($videoStoreTest->getVideoStore() as $index => $video)
        {
            echo "{$video->getTitle()} | rating: {$video->getRating()} | total votes: {$video->getRatingVoteCount()}\n";
        }
        echo PHP_EOL;

    }
public function rentOutAllVideos(): void
{
    $videoStoreTest = new VideoStore();
    $videoStoreTest->addVideoToTheStore(new Video('The Matrix'));
    $videoStoreTest->addVideoToTheStore(new Video('Godfather II'));
    $videoStoreTest->addVideoToTheStore(new Video('Star Wars Episode IV: A New Hope'));

    $videoStoreTest->rentVideoFromStore($videoStoreTest->getVideoStore()[0]);
    $videoStoreTest->rentVideoFromStore($videoStoreTest->getVideoStore()[1]);
    $videoStoreTest->rentVideoFromStore($videoStoreTest->getVideoStore()[2]);
    echo 'Rent out all videos'. PHP_EOL;
    foreach ($videoStoreTest->getVideoRentedOut() as $index => $video)
    {
        echo "[{$index}] {$video->getTitle()} | rating: {$video->getRating()} | {$video->getCondition()}" . PHP_EOL;
    }
    echo PHP_EOL;

    echo 'Return all videos'. PHP_EOL;
    $videoStoreTest->returnVideoToTheStore($videoStoreTest->getVideoStore()[0],8);
    $videoStoreTest->returnVideoToTheStore($videoStoreTest->getVideoStore()[1],7);
    $videoStoreTest->returnVideoToTheStore($videoStoreTest->getVideoStore()[2],8);
    foreach ($videoStoreTest->getVideoStore() as $index => $video)
    {
        echo "[{$index}] {$video->getTitle()} | rating: {$video->getRating()} | {$video->getCondition()}" . PHP_EOL;
    }
    echo PHP_EOL;
}
public function inventoryAfterGodFather(): void
{
    $videoStoreTest = new VideoStore();
    $videoStoreTest->addVideoToTheStore(new Video('The Matrix'));
    $videoStoreTest->addVideoToTheStore(new Video('Godfather II'));
    $videoStoreTest->addVideoToTheStore(new Video('Star Wars Episode IV: A New Hope'));

    echo "Before renting Godfather:" . PHP_EOL;
    foreach ($videoStoreTest->getVideoStore() as $index => $video)
    {
        echo "[{$index}] {$video->getTitle()} | rating: {$video->getRating()} | {$video->getCondition()}" . PHP_EOL;
    }
    echo PHP_EOL;
    echo "After rented Godfather:" . PHP_EOL;
    $videoStoreTest->rentVideoFromStore($videoStoreTest->getVideoStore()[1]);
    foreach ($videoStoreTest->getVideoStore() as $index => $video)
    {
        echo "[{$index}] {$video->getTitle()} | rating: {$video->getRating()} | {$video->getCondition()}" . PHP_EOL;
    }
    echo PHP_EOL;
}

}


$videoTest = new VideoStoreTest();


$videoTest->addMoviesToTest();

//$videoTest->giveSeveralRatings();
//
//$videoTest->rentOutAllVideos();
//
//$videoTest->inventoryAfterGodFather();



