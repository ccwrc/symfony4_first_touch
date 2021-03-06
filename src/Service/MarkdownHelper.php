<?php
/**
 * Created by PhpStorm.
 * User: ccwrc
 * Date: 22.02.18
 * Time: 10:51
 */

namespace App\Service;

use Michelf\MarkdownInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class MarkdownHelper{

    private $cache;
    private $markdown;
    /**
     * auto ini - $logger -> alt+enter (-> init fields)
     * @var LoggerInterface
     */
    private $logger;
    private $isDebug;

    /**
     * auto-generate phpdoc in phpstorm -> alt+enter
     * MarkdownHelper constructor.
     * @param AdapterInterface $cache
     * @param MarkdownInterface $markdown
     */
    public function __construct(AdapterInterface $cache, MarkdownInterface $markdown,
                                LoggerInterface $markdownLogger, bool $isDebug) {
        // bool $isDebug see -> config/services.yaml
        $this->cache = $cache;
        $this->markdown = $markdown;
        $this->logger = $markdownLogger;
        $this->isDebug = $isDebug;
    }

    /**
     * @param string $source
     * @return string
     */
    public function parse(string $source): string {
        if(strpos($source, 'bacon') !== false) {
            $this->logger->info('bekon na sniadanie');
        }

        if($this->isDebug) {
            return $this->markdown->transform($source);
        }

        $item = $this->cache->getItem("markdown_".md5($source));
        if(!$item->isHit()) {
            $item->set($this->markdown->transform($source));
            $this->cache->save($item);
        }
        return $item->get();
    }

}