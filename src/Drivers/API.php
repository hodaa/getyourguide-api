<?php

namespace GetYourGuide\Drivers;

class API
{
    private $url;

    public function __construct($config)
    {
        $this->url = $config['API']['url'];
    }

    public function getResource()
    {
        $content = @file_get_contents($this->url);
        if ($content === false) {
            die('Error ! URl Not found');
        }

        return json_decode($content);
    }
}
