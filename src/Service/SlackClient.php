<?php
/**
 * Created by PhpStorm.
 * User: ccwrc
 * Date: 26.02.18
 * Time: 15:32
 */

namespace App\Service;


use Nexy\Slack\Client;
use Psr\Log\LoggerInterface;

class SlackClient
{
    private $slack;
    /**
     * @var LoggerInterface|null
     */
    private $logger;

    public function __construct(Client $slack)
    {

        $this->slack = $slack;
    }

    /**
     * @param LoggerInterface $logger
     * @required
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function sendMessage(string $from, string $message)
    {
        if($this->logger) {
            $this->logger->info('beaming a message to slack test');
        }

        $slackMessage = $this->slack->createMessage()
            ->from($from)
            ->withIcon(':ghost:')
            ->setText($message)
        ;

        $this->slack->sendMessage($slackMessage);
    }

}