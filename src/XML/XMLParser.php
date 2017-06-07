<?php
declare(strict_types=1);

namespace App\XML;

class XMLParser
{
    private $filePath;
    private $basePath;

    /**
     * XMLParser constructor.
     * @param string $file
     */
    public function __construct(string $file, string $basePath = "../../xml")
    {
        $this->filePath = $file;
        $this->basePath = $basePath;
    }

    public function toJSON() : string
    {
        $fileContents= file_get_contents($this->filePath);
        $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
        $simpleXml = simplexml_load_string($fileContents);
        return json_encode($simpleXml);
    }
}
