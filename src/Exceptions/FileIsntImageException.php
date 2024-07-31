<?php

namespace app\Exceptions;

class FileIsntImageException extends \Exception
{
    protected $message = 'File is not an image';
}