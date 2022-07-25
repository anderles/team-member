<?php
declare(strict_types = 1);

namespace Elogic\Teammate\Cron;

use Psr\Log\LoggerInterface;

class Teammate
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function execute()
    {
        $this->logger->info('Start logging ....');
        $this->logger->info('Hello, we are from Ukraine!');
        $this->logger->info('Finish logging ....');
    }
}
