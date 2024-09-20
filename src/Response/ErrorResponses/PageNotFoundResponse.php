<?php

namespace app\Response\ErrorResponses;

use app\Enum\CodeStatus;
use app\Enum\ContentType;
use app\Response\Response;
use app\Utils\View;

class PageNotFoundResponse extends Response
{
    public function __construct()
    {
        parent::__construct(View::make('error/404.html'), ContentType::text, CodeStatus::NotFound->value);
    }

}