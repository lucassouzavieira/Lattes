<?php
namespace App\Controllers;

use App\XML\XmlParser;

class HomeController extends Controller
{
    public function index()
    {
        $path = 'xml/curriculo.xml';

        $parser = new XmlParser($path);

        echo "<pre>";
        var_dump(json_decode($parser->toJSON(), true));

        return false;
    }
}
