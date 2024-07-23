<?php

namespace app\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD|Attribute::IS_REPEATABLE)]
class Request
{
    public function __construct(public string $routePath, public string $method = 'get')
    {
    }
}