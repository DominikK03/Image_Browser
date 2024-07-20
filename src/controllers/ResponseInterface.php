<?php

namespace controllers;

interface ResponseInterface
{
    public function setCode(int $code);
    public function getCode();
    public function setHeader(string $header);
    public function getHeader();
    public function setBody(string $body);
    public function getBody();

}
