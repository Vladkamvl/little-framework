<?php


namespace Core;


class Renderer
{
    public function renderView(string $view, array $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent(string $content)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $content, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        require_once Application::$ROOT_DIR . '/views/layouts/' . $layout . '.php';
        return ob_get_clean();
    }

    protected function renderOnlyView(string $view, array $params = []){
        extract($params);
        ob_start();
        require_once Application::$ROOT_DIR . '/views/' . $view . '.php';
        return ob_get_clean();
    }
}