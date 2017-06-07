<?php
namespace App\Controllers;

use App\XML\XMLParser;

class HomeController extends Controller
{
    public function index()
    {
        $path = 'xml/curriculo.xml';

        $parser = new XMLParser($path);

        echo "<pre>";
        var_dump(json_decode($parser->toJSON(), true));

        return false;
    }
}
