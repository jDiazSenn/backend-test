<?php

namespace App\controllers;


use App\Libraries\VideoLibrary;
use App\Video;

class VideoImport
{
    /**
     * @param $source
     * @throws \Exception
     */
    public function import($source)
    {
        $videoLibrary = new VideoLibrary();
        if($source === 'glorf')
        {
            $videos = $this->getGlorfData();
            $videoLibrary->addVideos($videos);
        }
        else if($source === 'flub')
        {
            $videos = $this->getFlubData();
            $videoLibrary->addVideos($videos);
        }
        else
        {
            // Should never get in here as we are checking the source before gets here.
            throw new \Exception('Wrong Source');
        }

    }

    /**
     * @return Video[]
     */
    public function getGlorfData()
    {
        // Getting videos data as Video objects from glorf file.
        $glorfImport = new \App\controllers\GlorfImport();
        return $glorfImport->getVideos();
    }

    /**
     * @return Video[]
     */
    public function getFlubData()
    {
        // Getting videos data as Video objects from flub file.
        $flubImport = new \App\controllers\FlubImport();
        return $flubImport->getVideos();
    }
}