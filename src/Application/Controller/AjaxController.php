<?php

namespace Firestorm\Application\Controller;

use Firestorm\Application\HasLoggerTrait;
use Firestorm\Application\Repository\TestQuestionsRepository;

/**
 * Class AjaxController
 * @package Firestorm\Application
 */
class AjaxController
{
    use HasLoggerTrait;

    /** @var TestQuestionsRepository $testQuestionsRepository */
    protected $testQuestionsRepository;

    public function __construct(TestQuestionsRepository $testQuestionsRepository)
    {
        $this->testQuestionsRepository = $testQuestionsRepository;
    }
}
