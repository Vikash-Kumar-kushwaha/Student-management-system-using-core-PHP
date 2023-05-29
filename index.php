<?php
session_start();

include 'oopslogic/WebContent.php';

WebContent::header();

WebContent::initDatabase();

if (isset($_SESSION['id']) && isset($_SESSION['pass'])) {
    WebContent::topbar();
    WebContent::sidebar();
    if (isset($_GET["page"])) {
        switch ($_GET['page']) {
            case 'registration':
                WebContent::content($_GET["page"]);
                break;
            // case 'update' && isset($_GET['studentid']):
            //     WebContent::content($_GET['page'], $_GET['studentid']);
            //     break;
            case 'totalDeptCount':
                include 'body/totalDept.php';
                break;
        }

    } else {
        WebContent::content();
    }
    WebContent::update();
    WebContent::footer();
} else {
    WebContent::login();
}


?>