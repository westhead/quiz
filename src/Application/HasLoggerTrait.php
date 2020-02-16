<?php

namespace Firestorm\Application;

/** NB: deliberately faked import for Logger class; this would be a PSR-3 Logger such as Monolog */
use \stdClass as Logger;

/**
 * Generic Logger trait which would be used to inject PSR-3 logger
 * NB: for the purpose of this sample, no logger is configured.
 *
 * Class HasLoggerTrait
 * @package Firestorm\Traits
 */
trait HasLoggerTrait
{
    /** @var Logger PSR-3 */
    protected $logger = null;

    /**
     * @return Logger PSR-3
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @param Logger $logger
     * @return $this
     */
    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;

        return $this;
    }
}
