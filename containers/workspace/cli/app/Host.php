<?php

namespace App;

class Host
{
    public function createDirectory(string $directory)
    {
        return @mkdir($directory, 0755, true);
    }
}