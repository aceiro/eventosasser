<?php
    $shadow = require_once 'shadow.php';

    return array(
        //
        // par�metros gerais para a app
        'title'     => 'Eventos Asser',

        //
        // par�metros gerais para o banco de dados
        'dbname'    => 'eventsis',
        'dsn'       => "mysql:host=localhost;dbname=eventsis",
        'dbuser'    => minutum($shadow['u']),
        'dbpass'    => minutum($shadow['p'])
    );