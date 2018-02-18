<?php
/**
 * Created by PhpStorm.
 * User: ccwrc
 * Date: 14.02.18
 * Time: 18:46
 */

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController {

    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage() {

        //return new Response("first text art controller");
        return $this->render("article/homepage.html.twig");
    }

    /**
     * @Route("/news/{slug}", name="article_show")
     */
    public function show($slug) {

        $comments = [
            "comment 1 ytytyyt uyuu yuyuy yuuy gh ghg ",
            "comment 2 ytytyyt uyuu yuyuy yuuy gh ghg ",
            "comment 3 ytytyyt uyuu yuyuy yuuy gh ghg ",
        ];

        // dump($slug, $this);

        return $this->render("article/show.html.twig", [
            "title" => ucwords(str_replace("-", " ", $slug)),
            "comments" => $comments,
            "slug" => $slug,
        ]);
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart",
     * methods={"POST"})
     */
    public function toggleArticleHeart($slug, LoggerInterface $logger) {
        //

        $logger->info("Logger message - article is being hearted");
        //return $this->json(["hearts" => mt_rand(3, 121)]);
        return new JsonResponse(["hearts" => mt_rand(3, 121)]);
    }

}