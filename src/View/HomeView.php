<?php

namespace app\View;

use AllowDynamicProperties;
use app\Util\TemplateRenderer;

#[AllowDynamicProperties] class HomeView implements ViewInterface
{
    public function __construct(ImageGalleryView $galleryView, UploaderView $uploaderView)
    {
        $this->galleryView = $galleryView;
        $this->uploaderView = $uploaderView;
    }

    public function renderWithRenderer(TemplateRenderer $renderer): string
    {
        return $renderer->renderHtml('base.html', [
            '{ImageGallery}' => $this->galleryView->renderWithRenderer($renderer),
            '{ImageUploader}' => $this->uploaderView->renderWithRenderer($renderer)
        ]);
    }
}