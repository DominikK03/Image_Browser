<?php

namespace app\View;

use app\Utils\TemplateRenderer;

interface ViewInterface
{
    public function renderWithRenderer(TemplateRenderer $renderer):string;
}