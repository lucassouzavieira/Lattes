<?php
declare(strict_types=1);

namespace App\XML;

/**
 * Class XmlParser
 * @package App\XML
 * @author Lucas S. Vieira
 */
class XmlParser
{
    /**
     * Path to XML file
     * @var string
     */
    private $filePath;

    /**
     * Base path to locate XML documents
     * @var string
     */
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

    /**
     * Returns a XML document to JSON
     * @return string
     */
    public function toJSON(): string
    {
        $document = null;
        $this->normalizeXml($this->loadXmlFile(), $document);
        return json_encode($document);
    }

    /**
     * Load XML file
     * @return \SimpleXMLElement
     */
    private function loadXmlFile()
    {
        $fileContents = file_get_contents($this->filePath);
        $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
        return simplexml_load_string($fileContents);
    }

    /**
     * Normalize XML document
     * @param $xmlObject
     * @param $result
     */
    private function normalizeXml($xmlObject, &$result)
    {
        $data = $xmlObject;

        if (is_object($data)) {
            $data = get_object_vars($data);
        }

        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $res = null;
                $this->normalizeXml($value, $res);

                if (($key == '@attributes') && ($key)) {
                    $result = $res;
                    continue;
                }

                $result[$key] = $res;
            }

            return;
        }

        $result = $data;
    }
}
