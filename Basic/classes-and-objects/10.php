<?php
class Application
{
    function run()
    {
        $videoStore = new VideoStore();
        while (true) {
            echo "-------------------------------------------" . PHP_EOL;
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->addMovies($videoStore);
                    break;
                case 2:
                    $this->rentVideo($videoStore);
                    break;
                case 3:
                    $this->returnVideo($videoStore);
                    break;
                case 4:
                    $this->listInventory($videoStore);
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function addMovies($videoStore): void
    {
        $video = (string) readline('Enter video title which add to the store: ');
        $videoStore->addVideoToTheStore(new Video($video));

        //todo
    }

    private function rentVideo($videoStore): void
    {
        if (count($videoStore->getVideoStore()) == count($videoStore->getVideoRentedOut()))
        {
            echo "Sorry all videos are rented out." . PHP_EOL;
            return;
        }

            foreach ($videoStore->getVideoStore() as $index => $video) {
                if ($video->getCondition() === 'rented Out') continue;
                echo "[{$index}] {$video->getTitle()} | rating: {$video->getRating()} | {$video->getCondition()}" . PHP_EOL;
            }
            echo PHP_EOL;
            $option = (int)readline('Enter number, which video you would like to rent: ');
            $videoStore->rentVideoFromStore($videoStore->getVideoStore()[$option]);
            //todo

    }

    private function returnVideo($videoStore): void
    {
        if(count($videoStore->getVideoRentedOut()) <1)
        {
            echo "All rented videos has been returned" . PHP_EOL;
            return;
        }

        foreach ($videoStore->getVideoRentedOut() as $index => $video)
    {

        echo "[{$index}] {$video->getTitle()} | rating: {$video->getRating()} " . PHP_EOL;
    }
        echo PHP_EOL;
        $option = (int) readline('Enter number, which video you would like to return: ');
        $rating = (int) readline('Please rate the video (0-10): ');

        $videoStore->returnVideoToTheStore($videoStore->getVideoRentedOut()[$option], $rating);

        //todo
    }

    private function listInventory($videoStore): void
    {
        echo PHP_EOL;
        foreach ($videoStore->getVideoStore() as $index => $video)
{
    echo "[{$index}] {$video->getTitle()} | rating: {$video->getRating()} | {$video->getCondition()}" . PHP_EOL;
}
echo PHP_EOL;
        //todo
    }
}

class VideoStore
{
    private array $videoStore =[];
    private array $videoRentedOut =[];


    public function addVideoToTheStore(Video $video)
    {
        $this->videoStore[] = $video;
    }

    public function rentVideoFromStore(Video $video): void
    {
                $video->checkOutVideo();
                $this->videoRentedOut[]=$video;
    }

    public function returnVideoToTheStore(Video $video,$rating): void
    {
                $video->returnVideo();
                $video->receiveARating($rating);
                $key = array_search($video, $this->videoRentedOut);
                array_splice($this->videoRentedOut, $key,1);
    }

    /**
     * @return array
     */
    public function getVideoStore(): array
    {
        return $this->videoStore;
    }

    /**
     * @return array
     */
    public function getVideoRentedOut(): array
    {
        return $this->videoRentedOut;
    }

    public function rateAMovie(Video $video,$rating): void
    {
        $video->receiveARating($rating);
    }

}

class Video
{
    private string $title;
    private string $condition;
    private float $rating;
    private int $ratingVoteCount;

    public function __construct($title, $condition = 'in store', $rating = 0, $ratingVoteCount = 0)
    {
        $this->title = $title;
        $this->condition = $condition;
        $this->rating = $rating;
        $this->ratingVoteCount = $ratingVoteCount;
    }

    public function checkOutVideo(): void
    {
        $this->condition = 'rented Out';
    }

    public function returnVideo():void
    {
        $this->condition = 'in store';
    }

    public function receiveARating($rating): void
    {
        if($this->rating == 0) {
            $this->rating = $rating;
        }
        $this->ratingVoteCount ++;
        $this->rating = ($this->rating+$rating)/2;

    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return float|int|mixed
     */
    public function getRating(): float
    {
        return round($this->rating,2);
    }

    /**
     * @return mixed|string
     */
    public function getCondition(): string
    {
        return $this->condition;
    }

    /**
     * @return int|mixed
     */
    public function getRatingVoteCount(): int
    {
        return $this->ratingVoteCount;
    }
}
$app = new Application();
$app->run();


//$matrix = new Video('The Matrix');
//$godfather = new Video('Godfather II');
//$starWars = new Video('Star Wars Episode IV: A New Hope');
//
//$videoStore = new VideoStore();
//$videoStore->addVideoToTheStore(new Video('The Matrix'));
//$videoStore->addVideoToTheStore(new Video('Godfather II'));
//$videoStore->addVideoToTheStore(new Video('Star Wars Episode IV: A New Hope'));



