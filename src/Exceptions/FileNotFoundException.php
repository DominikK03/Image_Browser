<?php

namespace app\Exceptions;

class FileNotFoundException extends \Exception
{
    protected $message = 'File not found';
}