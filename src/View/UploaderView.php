<?php

namespace app\View;

use AllowDynamicProperties;
use app\Attribute\Route;
use app\Response\ResponseInterface;
use app\TemplateRenderer;
use app\View;

#[AllowDynamicProperties] class UploaderView implements ViewInterface
{

    public function __construct(array $data = [])
    {
        $this->data = $data;

    }
    public function renderWithRenderer(TemplateRenderer $renderer):string
    {
       return $renderer->renderHtml('imageUploader.html', $this->data);
    }
}