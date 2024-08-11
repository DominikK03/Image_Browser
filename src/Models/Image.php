<?php

namespace app\Models;

abstract class Image
{
    public abstract function printImageData() : array;
}