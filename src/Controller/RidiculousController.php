<?php

/*
  check <=>
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class RidiculousController {

    /**
     * @Route("/number")
     */
    public function number() {
        $number = mt_rand(0, 100);

        return new Response(
                '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }



}
