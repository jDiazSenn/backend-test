<?php

namespace App\DAO;

use App\Video;

class VideoDAO
{
    protected $conn;

    public function __construct()
    {
        // Retrieving the connection
        $this->conn = Connection::getInstance()->getConn();
    }

    /**
     * @param Video $video
     */
    public function importVideo(Video $video)
    {
        /**
         * Implementation of the persistent data.
         *
         * Should implement some validation to check if the video has already been imported before.
         * We would call TagDAO form here to persist the tags related to video
         *
         * Instead showing expected message output
         */
        echo "importing: \"".$video->getTitle()."\"; Url: ".$video->getUrl()."; Tags: ";
        $tags = $video->getTags();
        if($tags)
        {
            for($i = 0 ; $i< count($tags); $i++)
            {
                echo $tags[$i]->getName();
                if($i < (count($tags)-1))
                {
                    echo ", ";
                }
            }
        }
        else
        {
            echo "(No tags)";
        }
        echo "\n";
    }
}