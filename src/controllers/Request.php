<?php

namespace controllers;

class Request
{
    private string $path;
    private string $method;

    public function __construct($path, $method)
    {
        $this->path = $path;
        $this->method = $method;

    }

    public function getPath(): string
    {
        $this->NormalizePath($this->path);
        return $this->path;
    }
    public function getMethod(): string
    {
        $this->method = strtoupper($this->method);
        return $this->method;
    }

    public function setMethod(string $method) : string
    {
        $this->method = strtoupper($method);

        return $this->method;
    }


    private function NormalizePath(string $path): void
    {
        $path = trim($path, '/');
        $path = "/{$path}/";
        $path = preg_replace('#[/]{2,}#', '/', $path);
    }
}