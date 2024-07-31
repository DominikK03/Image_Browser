<?php

namespace app\Exceptions;

class FileExistException extends \Exception
{
    protected $message = 'File already exist';

}