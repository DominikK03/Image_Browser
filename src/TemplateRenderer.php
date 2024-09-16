<?php

namespace app;
use app\Response\HtmlResponse;
use app\Response\ResponseInterface;

class TemplateRenderer
{
    public function renderHtmlResponse(string $template, array $data): ResponseInterface
    {
        return new HtmlResponse(View::make($template,$data));
    }
}