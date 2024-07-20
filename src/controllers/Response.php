<?php

namespace controllers;

class Response implements ResponseInterface
{
    private int $statusCode;
    private array $headers = [];
    private string $body;

    public function __construct(int $statusCode, array $headers, string $body)
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->body = $body;
    }

    public function setCode(int $code)
    {
        $this->statusCode = $code;
        http_response_code($code);
    }

    public function getCode()
    {
        return $this->statusCode;
    }

    public function setHeader(string $header)
    {
    }

    public function getHeader()
    {
        // TODO: Implement getHeader() method.
    }

    public function setBody(string $body)
    {
        $this->body = $body;
        require $body;
    }

    public function getBody()
    {
        return $this->body;
    }
}