<?php

namespace app\Exception;

class FileNotFoundException extends \Exception
{
    protected $message = 'File not found';
}