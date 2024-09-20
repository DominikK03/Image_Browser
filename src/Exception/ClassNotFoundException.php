<?php

namespace app\Exception;

use Psr\Container\NotFoundExceptionInterface;

class ClassNotFoundException extends \Exception
{
    protected $message = 'Class not found in Container';


}