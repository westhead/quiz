<?php

namespace Firestorm\Application\Controller;

use Firestorm\Application\Repository\TestQuestionsRepository;
use Firestorm\Application\Repository\TestsRepository;

/**
 * Class AjaxControllerFactory
 * @package Firestorm\Application\Controller
 */
class AjaxControllerFactory
{
    /**
     * @return AjaxController
     */
    public function __invoke()
    {
        /** NB: these dependencies would normally be provided by Service Manager or DI container */
        return new AjaxController(new TestsRepository(), new TestQuestionsRepository());
    }
}
