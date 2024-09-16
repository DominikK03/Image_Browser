<?php

namespace app\Exception;

class DirectoryNotFoundException extends \Exception
{
    protected $message = 'Directory not found';
}