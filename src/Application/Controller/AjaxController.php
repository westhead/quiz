<?php

namespace Firestorm\Application\Controller;

use Firestorm\Application\HasLoggerTrait;
use Firestorm\Application\Repository\TestQuestionsRepository;
use Firestorm\Application\Repository\TestsRepository;

/**
 * Class AjaxController
 * @package Firestorm\Application
 */
class AjaxController
{
    use HasLoggerTrait;

    /** @var TestsRepository $testsRepository */
    protected $testsRepository;

    /** @var TestQuestionsRepository $testQuestionsRepository */
    protected $testQuestionsRepository;

    /**
     * AjaxController constructor.
     * @param TestsRepository $testsRepository
     * @param TestQuestionsRepository $testQuestionsRepository
     */
    public function __construct(
        TestsRepository $testsRepository,
        TestQuestionsRepository $testQuestionsRepository
    ) {
        $this->testsRepository = $testsRepository;
        $this->testQuestionsRepository = $testQuestionsRepository;
    }

    /**
     * @return false|string
     */
    public function testsAction()
    {
        return json_encode($this->testsRepository->getTestList());
    }

    public function nextQuestionAction()
    {
        /**
         * Parse request for last question ID so that correct sequence can be derived
         * For brevity we use a fix value as  response is short circuited with same data.
         */
        $lastQuestionID = 1;

        return json_encode($this->testQuestionsRepository->getNextQuestion($lastQuestionID));
    }
}
