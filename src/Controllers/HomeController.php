<?php
namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        chdir(dirname(dirname(__DIR__)));
        $path = 'xml/rogeriomoreiralima.xml';

        $xml = simplexml_load_file($path);

        echo "<pre>";
        var_dump(json_encode($xml, true));
        die();

        return $this->app['twig']->render('welcome.twig', [
            'title' => 'Welcome page',
            'appname' => $this->app['config']['application']['name'],
            'welcome' => 'Welcome to Silex Arango Skeleton'
        ]);
    }
}
