<?php

namespace Firestorm\Application\Controller;

use Firestorm\Application\HasLoggerTrait;
use Firestorm\Application\Repository\RespondersRepository;
use Firestorm\Application\Repository\TestsRepository;

/**
 * Class IndexController
 * @package Firestorm\Application
 */
class IndexController
{
    use HasLoggerTrait;

    /** @var TestsRepository $testsRepository */
    protected $testsRepository;

    /** @var TestsRepository $responderRepository */
    protected $responderRepository;

    /**
     * IndexController constructor.
     * @param TestsRepository $testsRepository
     * @param RespondersRepository $responderRepository
     */
    public function __construct(TestsRepository $testsRepository, RespondersRepository $responderRepository)
    {
        $this->testsRepository = $testsRepository;
        $this->responderRepository = $responderRepository;

        /**
         * We would also normally inject the Form(s) to be used in the start and results views
         * Depending on requirements the same Form base or Fieldset could be used or separate Forms
         * NB: this implementation embeds the Form in the views for brevity
         */
    }

    /**
     * NB: this would use a Framework View Renderer but in this incarnation simply returns the template
     */
    public function startAction()
    {
        /** Prepare variables needed in view */
        $tests = $this->testsRepository->getTestList();
        /** $tests would normally be an array of TestEntities but for brevity, array is used instead of mapper */

        /**
         * NB: this would return a Framework View Renderer but for brevity we simply require the view.
         * A template library such as Twig or Blade could be used.
         */
        require "../../../view/application/index/start.phtml";
    }

    /**
     * NB: this would use a Framework View Renderer but in this incarnation simply returns the template
     */
    public function resultsAction()
    {
        /** todo: duplicate comments when final */

        require "../../../view/application/index/results.phtml";
    }
}
