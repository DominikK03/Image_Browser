<?php

namespace controllers;

class Request
{
    public const METHOD_HEAD = 'HEAD';
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    public const METHOD_PUT = 'PUT';
    public const METHOD_PATCH = 'PATCH';
    public const METHOD_DELETE = 'DELETE';
    public const METHOD_PURGE = 'PURGE';
    public const METHOD_OPTIONS = 'OPTIONS';
    public const METHOD_TRACE = 'TRACE';
    public const METHOD_CONNECT = 'CONNECT';

    private string $path;
    private string $method;
    private array $query;
    private array $request;

    public function __construct($path, $method, $query, $request)
    {
        $this->path = $path;
        $this->method = $method;
        $this->query = $query;
        $this->request = $request;
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

    public function getQuery(): array
    {
        return $this->query;
    }

    public function getRequest(): array
    {
        return $this->request;
    }

    public function getQueryParams(string $param)
    {
        return $this->query[$param] ?? null;
    }

    public function getRequestParams(string $param)
    {
        return $this->request[$param] ?? null;
    }


    private function NormalizePath(string $path): void
    {
        $path = trim($path, '/');
        $path = "/{$path}/";
        $path = preg_replace('#[/]{2,}#', '/', $path);
    }
}