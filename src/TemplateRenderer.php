<?php

namespace app;
use app\Responeses\HtmlResponse;
use app\Responeses\ResponseInterface;

class TemplateRenderer
{
    public function renderHtmlResponse(string $template, array $data): ResponseInterface
    {
        return new HtmlResponse(View::make($template,$data));
    }
}