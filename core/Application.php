<?php

namespace Core;

/*
 * class Application
 *
 * @package Core
 *
 */

class Application{

    public static string $ROOT_DIR;

    public Router $router;
    public Request $request;
    public Response $response;
    public Renderer $renderer;
    public BaseController $controller;

    public static Application $app;

    public function __construct(string $rootPath){
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->renderer = new Renderer();
        $this->router = new Router($this->request, $this->response, $this->renderer);
    }

    public function run(){
        echo $this->router->resolve();
    }

    /**
     * @return BaseController
     */
    public function getController(): BaseController
    {
        return $this->controller;
    }

    /**
     * @param BaseController $controller
     */
    public function setController(BaseController $controller): void
    {
        $this->controller = $controller;
    }

}