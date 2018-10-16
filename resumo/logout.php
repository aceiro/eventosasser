<?php
    header("Content-Type: text/html; charset=UTF-8", true);
    require_once("../cfg/Session.php");
    $session = new Session(SESSION_SERVER_ID);
    $session->destroy();

    header( "Location: ../index.html", true);