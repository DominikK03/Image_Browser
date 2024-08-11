<?php

namespace app;

class View
{

    public function __construct(protected string $view, protected array $data = [])
    {

    }

    public static function make(string $view, array $data = []) : static
    {
        return new static($view, $data);
    }

    public function render() : string
    {
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';
        if (!file_exists($viewPath)) {
            throw new \Exception('View file not found');
        }

        foreach ($this->data as $key => $value){
            $$key = $value;
        }

        include $viewPath;

        return $viewPath;
    }

    public function __toString(): string
    {
        return $this->render();
    }
}