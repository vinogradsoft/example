<?php

namespace Example;

use Vinograd\SimpleFiles\Directory;
use Vinograd\SimpleFiles\File;

class CacheCleaner
{

    /**
     * @param string $path
     * @return void
     */
    public function clean(string $path): void
    {
        $cacheFiles = glob($path . '/*');
        $varCacheDirectory = Directory::createBinded($path);
        foreach ($cacheFiles as $filePath) {
            $varCacheDirectory->addFile(File::createBinded($filePath));
        }
        $varCacheDirectory->delete();
    }

}