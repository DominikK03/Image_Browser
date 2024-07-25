<?php

namespace app;

class Request
{
    public function __construct(private string $path, private string $method, private array $request, private array $query, private array $files)
    {
    }

    public function getPath(): string
    {
        return $this->path;
    }
    public function getMethod(): string
    {
        return $this->method;
    }
    public function getRequest(): array
    {
        return $this->request;
    }
    public function getQuery(): array
    {
        return $this->query;
    }
    public function getFiles(): array
    {
        return $this->files;
    }
    public function getFile(string $name): ?string
    {
        return $this->files[$name] ?? null;
    }
    public function getRequestParam(string $name)
    {
        return $this->query[$name] ?? null;
    }
    public function getQueryParam(string $name)
    {
        return $this->query[$name] ?? null;
    }
}