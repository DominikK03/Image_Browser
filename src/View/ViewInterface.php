<?php

namespace app\View;

use app\TemplateRenderer;

interface ViewInterface
{
    public function renderWithRenderer(TemplateRenderer $renderer):string;
}