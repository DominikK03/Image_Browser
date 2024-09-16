<?php

namespace app\Exception;

class ImageExistException extends \Exception
{
    protected $message = 'Image already exist';

}