<?php
declare(strict_types=1);

namespace Example;

use Vinograd\SimpleFiles\File;
use Vinograd\SimpleFiles\Event\FileBeforeWriteListener;

class TemplateHandler implements FileBeforeWriteListener
{

    private string $vendor;
    private string $moduleName;

    /**
     * @param string $vendor
     * @param string $moduleName
     */
    public function __construct(string $vendor, string $moduleName)
    {
        $this->vendor = $vendor;
        $this->moduleName = $moduleName;
    }

    /**
     * @inheritDoc
     */
    public function beforeWrite(File $file, string $keyOperation): void
    {
        if ($keyOperation !== File::COPY) {
            return;
        }
        $content = $file->getContent();

        if ($file->getLocalName() === 'package.xml') {

            $content = str_replace(":vendor", $this->vendor, $content);
            $file->setContent(str_replace(":module_name", $this->moduleName, $content));

        } elseif ($file->getLocalName() === 'composer.json') {

            $content = str_replace(":vendor", strtolower($this->vendor), $content);
            $content = str_replace(":module_name", strtolower($this->moduleName), $content);
            $content = str_replace(":Vendor", $this->vendor, $content);
            $file->setContent(str_replace(":Module_name", $this->moduleName, $content));
        }
    }

}