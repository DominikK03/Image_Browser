<?php

namespace app\Enums;

use http\Header;

enum ContentType: string
{
    case text = 'Content-Type: text/html';
    case image = 'Content-Type: image/jpeg';
    case application = 'Content-Type: application/json';

}
