<?php
declare(strict_types=1);

namespace Example;

use Vinograd\SimpleFiles\Directory;
use Vinograd\SimpleFiles\File;

class TestCreator
{

    /**
     * @param string $destination
     * @param string $className
     * @return void
     * @throws \ReflectionException
     */
    public function create(string $destination, string $className): void
    {
        $classNameArray = explode('\\', $className);

        $shortClassName = array_pop($classNameArray); // extract class short name

        $vendorDirectory = new Directory(array_shift($classNameArray)); // Vendor
        $lastDirectory = $vendorDirectory->addDirectory(new Directory(array_shift($classNameArray))); // Module
        $lastDirectory = $lastDirectory->addDirectory(new Directory('Test'));
        $lastDirectory = $lastDirectory->addDirectory(new Directory('Unit'));
        $lastDirectory = $lastDirectory->addDirectory(new Directory(array_shift($classNameArray))); // Required directory

        foreach ($classNameArray as $directoryName) {
            $lastDirectory = $lastDirectory->addDirectory(new Directory($directoryName)); //other subdirectories
        }

        $testTemplateFile = File::createBinded(__DIR__ . '/test.php.tpl');

        $testTemplateFile->read();
        $content = $testTemplateFile->getContent();

        $content = $this->fillOutTemplate($className, $lastDirectory, $content, $shortClassName);

        $testTemplateFile->setContent($content);
        $testTemplateFile->setLocalName($shortClassName . 'Test.php');

        $lastDirectory->addFile($testTemplateFile);

        $vendorDirectory->writeTo($destination);
    }

    /**
     * @param string $className
     * @param Directory $directory
     * @param string $content
     * @param string $shortClassName
     * @return string
     * @throws \ReflectionException
     */
    private function fillOutTemplate(string $className, Directory $directory, string $content, string $shortClassName): string
    {
        $class = new \ReflectionClass($className);
        $methods = $class->getMethods(\ReflectionMethod::IS_PUBLIC);
        $testMethods = [];
        foreach ($methods as $method) {
            $testMethods [] = '    public function test' . ucfirst($method->getName()) . '() {}' . PHP_EOL;
        }

        $content = str_replace(':module', str_replace('/', '\\', $directory->getLocalPath()), $content);
        $content = str_replace(':use', $className, $content);
        $content = str_replace(':class_name', $shortClassName, $content);
        return str_replace(':methods', implode(PHP_EOL, $testMethods), $content);
    }

}