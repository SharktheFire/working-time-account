<?php

class View
{
    private $variablesForView;
    private $path;

    public function __construct(array $variablesForView, string $path)
    {
        $this->variablesForView = $variablesForView;
        $this->path = $path;
    }

    public function render()
    {
        $variables = $this->variablesForView;
        ob_start();
            include __DIR__ . $this->path;
        return ob_get_clean();
    }
}
