<?php

class Router
{
    private $requestedPath;
    private $controller;

    public function __construct(Controller $controller)
    {
        $this->requestedPath = $_SERVER['REQUEST_URI'];
        $this->host = $_SERVER['HTTP_HOST'];
        $this->controller = $controller;
    }

    public function navigate()
    {
        switch ($this->requestedPath) {
            case '/service':
                return $this->controller->renderMain('/views/MainView.php');
            case '/profile':
                return $this->controller->renderProfile('/views/ProfileView.php');
            case '/addWorkingTime':
                return $this->controller->renderAddTimeAction();
            default:
                http_response_code(404);
                return $this->controller->renderErrorPage('/views/ErrorPage.php');
        }
    }
}
