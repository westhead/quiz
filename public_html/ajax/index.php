<?php

use Firestorm\Application\Controller\AjaxControllerFactory;
use Firestorm\Application\Controller\IndexControllerFactory;

chdir(__DIR__);

include_once("../../vendor/autoload.php");

const ERROR_MESSAGE_NO_VALID_ACTION = "No valid action requested";
const ROUTER_ACTION = "action";
const ROUTER_PAGE_START = "tests";
const ROUTER_AJAX_SAVE_ANSWER = "ajax/save-answer";
const ROUTER_AJAX_QUESTION_NEXT = "next-question"; // NB includes answer options
const ROUTER_AJAX_TEST_LIST = "test-list";
const ROUTER_AJAX_RESPONDER_LIST = "ajax/responder-list";

/**
 * NB: We would normally use a template engine layout here for json response.
 */

/**
 * NB: this would normally use a Router either standalone or framework but for brevity we use a simple action fuse box.
 */

if (! isset($_GET[ROUTER_ACTION]) || empty($_GET[ROUTER_ACTION])) {
    die(ERROR_MESSAGE_NO_VALID_ACTION);
}

$action = $_GET[ROUTER_ACTION];

/*
 * NB: these would normally be wired by the Service Manager or similar dependency container.
 */
$ajaxControllerFactory = new AjaxControllerFactory();
$ajaxController = $ajaxControllerFactory();

switch ($action) {
    case ROUTER_AJAX_TEST_LIST:
        echo $ajaxController->testsAction();

        break;
    case ROUTER_AJAX_QUESTION_NEXT:
        echo $ajaxController->nextQuestionAction();

        break;
    default:
        echo ERROR_MESSAGE_NO_VALID_ACTION . $action;

        break;
}
