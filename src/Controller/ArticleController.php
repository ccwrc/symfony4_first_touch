<?php
/**
 * Created by PhpStorm.
 * User: ccwrc
 * Date: 14.02.18
 * Time: 18:46
 */

namespace App\Controller;

use App\Service\MarkdownHelper;
use App\Service\SlackClient;
//use Nexy\Slack\Client;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController {

    /**
     * @var bool
     * currently used: just showing a controller with a constructor
     * in symfony 4.1 AbstractController will have a $this->getParameter() shortcut method
     */
    private $isDebug;

    // autowiring is really work in constructor functions
    public function __construct(bool $isDebug) { // alt+enter -> init field

        $this->isDebug = $isDebug;
    }

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
    public function show($slug, MarkdownHelper $markdownHelper, SlackClient $slack) {

        if($slug == "blaaa") {
            $slack->sendMessage('Khan', 'very simple message 1');
        }

        $comments = [
            "comment 1 ytytyyt uyuu yuyuy yuuy gh ghg ",
            "comment 2 ytytyyt uyuu yuyuy yuuy gh ghg ",
            "comment 3 ytytyyt uyuu yuyuy yuuy gh ghg ",
        ];

        // dump($slug, $this);

        $articleContent = <<<EOF
Sed ut **perspiciatis** unde omnis [iste](http://www.zakazanaplaneta.pl/) natus **error** sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi bacon architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
EOF;

        //dump($cache); die;
        //phpinfo(); die;
        $articleContent = $markdownHelper->parse($articleContent);
        //dump($markdown); die;

        return $this->render("article/show.html.twig", [
            "title" => ucwords(str_replace("-", " ", $slug)),
            "comments" => $comments,
            "slug" => $slug,
            "articleContent" => $articleContent,
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