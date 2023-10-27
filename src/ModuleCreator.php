<?php
declare(strict_types=1);

namespace Example;

use Vinograd\SimpleFiles\Directory;
use Vinograd\SimpleFiles\File;

class ModuleCreator
{

    /**
     * @param string $destination
     * @param string $vendor
     * @param string $moduleName
     * @return void
     */
    public function create(string $destination, string $vendor, string $moduleName): void
    {
        $etcDirectory = new Directory('etc');
        $controllerDirectory = new Directory('Controller');
        $modelDirectory = new Directory('Model');
        $viewDirectory = new Directory('View');

        $vendorDirectory = new Directory($vendor);
        $moduleDirectory = new Directory($moduleName);

        $packageXmlFile = new File('package.xml');
        $composerJsonFile = File::createBinded(__DIR__ . '/composer.json.tpl');

        $packageXmlFile->setContent(
            '<?xml version="1.0"?>' . PHP_EOL .
            '<package>' . PHP_EOL .
            '    <name>:vendor/:module_name</name>' . PHP_EOL .
            '    <version>1.0.0</version>' . PHP_EOL .
            '</package>'
        );

        $composerJsonFile->setLocalName('composer.json');

        $templateHandler = new TemplateHandler($vendor, $moduleName);
        $packageXmlFile->addFileBeforeWriteListener($templateHandler);
        $composerJsonFile->addFileBeforeWriteListener($templateHandler);


        $vendorDirectory->addDirectory($moduleDirectory);
        $moduleDirectory->addDirectory($etcDirectory);

        $moduleDirectory->addDirectory($controllerDirectory);
        $moduleDirectory->addDirectory($modelDirectory);
        $moduleDirectory->addDirectory($viewDirectory);

        $etcDirectory->addFile($packageXmlFile);
        $moduleDirectory->addFile($composerJsonFile);

        $vendorDirectory->copy($destination);
    }

}