<?php

namespace App\controllers;

use App\Video;

class GlorfImport
{
    private $src = './feed-exports/glorf.json';

    /**
     * Get contents of the file and parse them into an array
     *
     * @return array
     */
    public function getParsedContents()
    {
        try{
            $contents = file_get_contents($this->src);
            $data = json_decode($contents, true);
            if(is_null($data) && json_last_error() !== JSON_ERROR_NONE)
                throw new \Error(json_last_error());
        }
        catch(\Exception $e)
        {
            echo 'Error:: ' . $e->getMessage();
        }
        return $data['videos'];
    }

    /**
     * @return Video[]
     */
    public function getVideos()
    {
        $videos = [];
        $data = $this->getParsedContents();
        foreach($data as $v)
        {
            $videos[] = new Video($v['title'], $v['url'], $v['tags']);
        }
        return $videos;
    }

}