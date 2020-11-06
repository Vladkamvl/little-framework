<?php


namespace Core;


class Router
{

    public Request $request;

    protected array $routes = [];

    public function __construct(Request $request){
        $this->request = $request;
    }

    public function get(string $path, $callback){

        $this->routes['get'][$path] = $callback;

    }

    public function resolve(){
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false){
            return 'route not found';
        }
        if(is_string($callback)){
            return $this->renderView($callback);
        }
        return  call_user_func($callback);
    }

    public function renderView(string $view)
    {
        $layoutContent = $this->layoutContent();
        include_once __DIR__ . '/../views/' . $view . '.php';
    }

    protected function layoutContent()
    {
    }

}