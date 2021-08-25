<?php

namespace trello;

class File 
{
    public static function GetRootDirectory($FileLocation, $stop = "trello") 
    {
        $dir = dirname($FileLocation);
        $pathList = explode("\\", $dir);
        $length = count($pathList);

        for ($i = $length - 1; $i > 0; $i--) {
            if (strtolower($pathList[$i]) == strtolower($stop)) {
                break;
            }

            unset($pathList[$i]);
        }

        $path = implode("\\", $pathList) . "\\";
        
        return $path;
    }

    public static function GetJsonData($uri) 
    {
        $json = file_get_contents($uri);
        $config = json_decode($json, true);

        return $config;
    }
}