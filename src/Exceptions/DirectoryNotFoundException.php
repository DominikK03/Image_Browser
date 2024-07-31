<?php

namespace app\Exceptions;

class DirectoryNotFoundException extends \Exception
{
    protected $message = 'Directory not found';
}