<?php

namespace App;

class Video
{
    private $title, $url, $tags;

    /**
     * Video constructor.
     * @param $title
     * @param $url
     * @param null $tags
     */
    public function __construct($title, $url, $tags = NULL)
    {
        try{
            $this->checkEmptyValues($title, $url);
            $this->validateUrl($url);
        }
        catch(\Exception $e)
        {
            echo "ERROR: " . $e->getMessage() . "\n";
        }
        $this->title = $title;
        $this->url = $url;
        // If tags are present assign them as Tag Object to the Video.
        if(is_array($tags) && count($tags))
        {
            foreach($tags as $name)
            {
                $this->tags[] = new Tag(trim($name));
            }
        }
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return Tag[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @param $title
     * @param $url
     * @throws \Exception
     */
    public function checkEmptyValues($title, $url)
    {
        if($title === '' || $url === '')
            throw new \Exception('Empty values not allowed', 500);
    }

    /**
     * @param $url
     * @throws \InvalidArgumentException
     */
    public function validateUrl($url)
    {
        if(! filter_var($url, FILTER_VALIDATE_URL))
            throw new \InvalidArgumentException('Wrong URL format', 500);
    }
}