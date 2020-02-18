<?php

namespace Firestorm\Application\Controller;

use Firestorm\Application\Repository\RespondersRepository;
use Firestorm\Application\Repository\TestsRepository;

/**
 * Class IndexControllerFactory
 * @package Firestorm\Application\Controller
 */
class IndexControllerFactory
{
    /**
     * @return IndexController
     */
    public function __invoke()
    {
        /** NB: these dependencies would normally be provided by Service Manager or DI container */
        return new IndexController(new TestsRepository(), new RespondersRepository());
    }
}
