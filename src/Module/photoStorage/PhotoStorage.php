<?php

namespace App\Module\photoStorage;

use Symfony\Component\HttpFoundation\Request;

class PhotoStorage
{
    private string $base;

    function __construct(string $base = '')
    {
        $this->base = $base;
    }

    public function saveImg(Request $request, $key): string
    {
        $file = $request->files->get($key);
        var_dump($file);
    }

    public function createImageLink(string $imageId): string
    {
        return $this->base . '/' . $imageId . '.png';
    }

    private function generateId() : string
    {
        return uniqid('', true);
    }
}