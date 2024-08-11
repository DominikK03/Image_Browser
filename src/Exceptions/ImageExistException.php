<?php

namespace app\Exceptions;

class ImageExistException extends \Exception
{
    protected $message = 'UploadImage already exist';

}