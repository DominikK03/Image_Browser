<?php

namespace app\View;

use AllowDynamicProperties;
use app\Utils\TemplateRenderer;

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