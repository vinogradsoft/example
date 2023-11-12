<?php

namespace Example;

use Vinograd\SimpleFiles\Directory;
use Vinograd\SimpleFiles\File;

class ImageMover
{

    /**
     * @param string $destination
     * @param string $pattern
     * @return void
     */
    public function move(string $destination, string $pattern): void
    {
        $images = glob($pattern);
        $imagesDirectory = new Directory('images');
        foreach ($images as $image) {
            $imagesDirectory->addFile(File::createBinded($image));
        }
        $imagesDirectory->move($destination);
    }

}