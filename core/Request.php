<?php


namespace Core;


class Request
{

    public function getPath() : string{
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if($position === false){
            return $path;
        }
        $path = substr($path, 0, $position);
        return $path;
    }

    public function getMethod() : string{
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        return $method;
    }
}