<?php

use Firestorm\Application\Controller\AjaxControllerFactory;
use Firestorm\Application\Controller\IndexControllerFactory;

chdir(__DIR__);

include_once("../../vendor/autoload.php");

const ERROR_MESSAGE_NO_VALID_ACTION = "No valid action requested";
const ROUTER_ACTION = "action";
const ROUTER_PAGE_START = "start";
const ROUTER_PAGE_RESULTS = "results";
const ROUTER_AJAX_SAVE_ANSWER = "ajax/save-answer";
const ROUTER_AJAX_QUESTION_NEXT = "ajax/question-next"; // NB includes answer options
const ROUTER_AJAX_TEST_LIST = "ajax/test-list";
const ROUTER_AJAX_RESPONDER_LIST = "ajax/responder-list";

/**
 * NB: We would normally use a template engine layout here but for brevity we only show the two main links
 */
?>
<html lang="en-GB">
<head>
    <title>Sample Tests</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/bootstrap.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-2 offset-4 align-content-center">
            <p>
                <a href="/test/?action=start" class="btn btn-primary">Start</a>
                <a href="/test/?action=results" class="btn btn-info">Results</a>
            </p>
        </div>
    </div>
</div>
<?php
/**
 * NB: this would normally use a Router either standalone or framework but for brevity we use a simple action fuse box.
 */

if (! isset($_GET[ROUTER_ACTION]) || empty($_GET[ROUTER_ACTION])) {
    echo ERROR_MESSAGE_NO_VALID_ACTION;
}

$action = $_GET[ROUTER_ACTION];

/*
 * NB: these would normally be wired by the Service Manager or similar dependency container.
 */
$indexControllerFactory = new IndexControllerFactory();
$ajaxControllerFactory = new AjaxControllerFactory();

$indexController = $indexControllerFactory();
$ajaxController = $ajaxControllerFactory();

switch ($action) {
    case ROUTER_PAGE_START:
        // set vars
        // todo: modify this to IndexController
        require "../../view/application/index/start.phtml";
        break;
    case ROUTER_PAGE_RESULTS:
        // set vars
        $indexController->resultsAction();
        break;
    default:
        echo ERROR_MESSAGE_NO_VALID_ACTION;
}

?>
</body>
</html>

