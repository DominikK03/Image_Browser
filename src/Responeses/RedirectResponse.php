<?php

namespace app\Responeses;

use app\Enums\ContentType;

class RedirectResponse extends Response
{
public function __construct(string $url, array $params)
{
    parent::__construct('',ContentType::text);
    header("Location: ". $url . "?" . http_build_query($params));
    die();

}

}