<?php

namespace App\Libraries;

use App\DAO\VideoDAO;
use App\Video;

class VideoLibrary
{
    protected $dao;

    /**
     * Creating instance of VideoDAO to persist the data.
     *
     * VideoLibrary constructor.
     */
    public function __construct()
    {
        // Get object to the persistent mechanism
        $this->dao = new VideoDAO();
    }

    /**
     * Sending video object to the data access object
     *
     * @param Video $video
     */
    public function addVideo(Video $video)
    {
        $this->dao->importVideo($video);
    }

    /**
     * @param Video[]
     */
    public function addVideos(array $videos)
    {
        if(count($videos))
        {
            foreach($videos as $video)
            {
                // Calling addVideo method on VideoLibrary to import the related video.
                $this->addVideo($video);
            }
        }
        else
            echo "No videos to import.\n";
    }
}