<?php


namespace Core;


class Router
{

    public Request $request;
    public Response $response;
    public Renderer $renderer;

    protected array $routes = [];

    public function __construct(Request $request, Response $response, Renderer $renderer){
        $this->request = $request;
        $this->response = $response;
        $this->renderer = $renderer;
    }

    public function get(string $path, $callback){

        $this->routes['get'][$path] = $callback;

    }

    public function post(string $path, $callback){

        $this->routes['post'][$path] = $callback;

    }

    public function resolve(){
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false){
            $this->response->setStatusCode(404);
            return $this->renderer->renderView('_404');
        }
        if(is_string($callback)){
            return $this->renderer->renderView($callback);
        }
        if(is_array($callback)){
            if(!class_exists($callback[0])){
                return $this->renderer->renderContent("Class $callback[0] doesnt exist");
            }else{
                if(!method_exists($callback[0], $callback[1])){
                    return $this->renderer->renderContent("Method $callback[1] in class $callback[0] doesnt exist");
                }else{
                    Application::$app->controller = new $callback[0]();
                    $callback[0] = Application::$app->controller;
                }
            }
        }
        return  call_user_func($callback, new Request());
    }



}