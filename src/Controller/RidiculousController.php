<?php

namespace App\Controller;

use App\Service\SayHello;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RidiculousController
 * @package App\Controller
 * @Route("/ridiculous")
 */
class RidiculousController {

    // Recipes: https://symfony.sh/
    // terminal: composer require annotations
    // composer require sec-checker --dev (it's run only in dev env)
    // composer require twig
    // composer require profiler --dev (web debug toolbar)
    // composer require debug --dev (right display dump in twig, phpunit, monolog, etc.)
    // composer unpack debug (unpack debug-pack in composer.json)
    // composer require asset
    // php bin/console cache:clear (after change config -> packages -> some.yaml reason:bug in early symf.4)
    // php bin/console config:dump twig (display bundle configuration)
    // full list services on container:
    // php bin/console debug:container --show-private
    // php bin/console debug:container --show-private searchWord (all with search)
    // php bin/console debug:container --parameters

    // short: php bin/console debug:autowiring

    // https://guides.wp-bullet.com/install-apcu-object-cache-for-php7-for-wordpress-ubuntu-16-04/
    // symfony error pages: https://symfony.com/doc/current/controller/error_pages.html
    // new config file? clear the cache!

    // class TestController extends AbstractController // give a shortcut method
    // container hold all services and... config values (parameters)
    // https://github.com/nexylan/slack-bundle

    /**
     * @Route("/number")
     */
    public function number()
    {
        $number1 = mt_rand(10, 20);
        $number2 = mt_rand(10, 20);
        $result = $number1 <=> $number2;

        return new Response(
                '<html><body>Result: ' . $result . '</body></html>'
        );
    }

    /**
     * @Route("/sayHello/{name}")
     */
    public function sayHello($name, SayHello $sayHello)
    {

        return new Response($sayHello->SayHelloName($name));

    }

}
