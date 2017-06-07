<?php

namespace App\Providers;

use App\XML\XMLParser;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class XMLParserServiceProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $app)
    {
        $app['xml'] = function () {
            return new XMLParser();
        };
    }
}
