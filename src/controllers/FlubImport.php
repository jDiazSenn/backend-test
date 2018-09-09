<?php

namespace App\controllers;

use App\Video;

class FlubImport
{
    private $src = './feed-exports/flub.yaml';

    /**
     * Get contents of the file and parse them into an array
     *
     * @return array
     */
    public function getParsedContents()
    {
        try{
            $contents = file_get_contents($this->src);
            $data = \Symfony\Component\Yaml\Yaml::parse($contents);
        }
        catch(\Exception $e)
        {
            echo 'Error:: ' . $e->getMessage();
        }
        return $data;
    }

    /**
     * @return Video[]
     */
    public function getVideos()
    {
        $videos = [];
        foreach($this->getParsedContents() as $video)
        {
            $videos[] = new Video($video['name'], $video['url'],
                isset($video['labels']) ? explode(",", $video['labels']) : NULL);
        }
        return $videos;
    }
}