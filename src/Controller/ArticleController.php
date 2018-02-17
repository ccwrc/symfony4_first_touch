<?php
/**
 * Created by PhpStorm.
 * User: ccwrc
 * Date: 14.02.18
 * Time: 18:46
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController {

    /**
     * @Route("/")
     */
    public function homepage() {

        return new Response("first text art controller");
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug) {

        $comments = [
            "comment 1 ytytyyt uyuu yuyuy yuuy gh ghg ",
            "comment 2 ytytyyt uyuu yuyuy yuuy gh ghg ",
            "comment 3 ytytyyt uyuu yuyuy yuuy gh ghg ",
        ];

        return $this->render("article/show.html.twig", [
            "title" => ucwords(str_replace("-", " ", $slug)),
            "comments" => $comments,
        ]);
    }

}