<?php

/*
  check <=>
 */

namespace App\Controller;

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
    // composer require sec-checker --dev
    //

    /**
     * @Route("/number")
     */
    public function number() {
        $number1 = mt_rand(10, 20);
        $number2 = mt_rand(10, 20);
        $result = $number1 <=> $number2;

        return new Response(
                '<html><body>Result: ' . $result . '</body></html>'
        );
    }



}
