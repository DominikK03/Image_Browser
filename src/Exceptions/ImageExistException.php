<?php

namespace app\Exceptions;

class ImageExistException extends \Exception
{
    protected $message = 'Image already exist';

}