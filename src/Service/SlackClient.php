<?php
/**
 * Created by PhpStorm.
 * User: ccwrc
 * Date: 26.02.18
 * Time: 15:32
 */

namespace App\Service;


use App\Helper\LoggerTrait;
use Nexy\Slack\Client;
//use Psr\Log\LoggerInterface;

class SlackClient
{
    use LoggerTrait;

    private $slack;

    public function __construct(Client $slack)
    {

        $this->slack = $slack;
    }

    public function sendMessage(string $from, string $message)
    {
        $this->logInfo('beaming a message to slack 2 test', [
            'message' => $message
        ]);

        $slackMessage = $this->slack->createMessage()
            ->from($from)
            ->withIcon(':ghost:')
            ->setText($message)
        ;

        $this->slack->sendMessage($slackMessage);
    }

}