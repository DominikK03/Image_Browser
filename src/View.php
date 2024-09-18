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
        $templatePath = TEMPLATE_PATH . '/' . $this->view . '.html';
        if (!file_exists($templatePath)) {
            throw new \Exception('Template file not found');
        }

        foreach ($this->data as $key => $value){
            $$key = $value;
        }

        include $templatePath;

        return $templatePath;
    }

    public function __toString(): string
    {
        return $this->render();
    }
}