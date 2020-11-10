<?php


namespace Core;


class BaseController
{
    public string $layout = 'main';

    public function render($view, array $params = []){
        return Application::$app->renderer->renderView($view, $params);
    }
    public function setLayout(string $layout){
        $this->layout = $layout;
    }
}