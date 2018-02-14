<?php
/**
 * Created by PhpStorm.
 * User: ccwrc
 * Date: 14.02.18
 * Time: 18:46
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController {

    /**
     * @Route("/")
     */
    public function homepage() {
        return new Response("first text art controller");
    }

}