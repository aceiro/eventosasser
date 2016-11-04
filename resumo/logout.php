<?php
    header("Content-Type: text/html; charset=UTF-8", true);
    require_once("../cfg/Session.php");
    $session = new Session("EventosAsser2016");
    $session->destroy();

    header( "Location: ../index.html", true);