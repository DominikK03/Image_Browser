<?php

namespace app\View;

use AllowDynamicProperties;
use app\TemplateRenderer;

#[AllowDynamicProperties] class ImageGalleryView implements ViewInterface
{
    public function __construct(array $data)
    {
        $this->data= $data;
    }

    public function renderWithRenderer(TemplateRenderer $renderer): string
    {
        return $renderer->renderHtml('imageGallery.html', $this->data['{images}']);
    }
}