<?php

namespace app\Enums;

enum ContentType: string
{
    case text = 'text/html';
    case application = 'application/json';
    case image = 'image/jpeg';


}
