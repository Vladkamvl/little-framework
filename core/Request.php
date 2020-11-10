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

    public function method() : string{
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        return $method;
    }
    public function isGet() : bool{
        return $this->method() === 'get';
    }
    public function isPost() : bool{
        return $this->method() === 'post';
    }
    public function getBody() : array{
        $body = [];

        if($this->isGet()){
            foreach ($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if($this->isPost()){
            foreach ($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}