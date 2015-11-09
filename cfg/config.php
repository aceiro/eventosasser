<?php
    $shadow = require_once 'shadow.php';

    return array(
        //
        // parâmetros gerais para a app
        'title'     => 'Eventos Asser',

        //
        // parâmetros gerais para o banco de dados
        'dbname'    => 'eventsis',
        'dsn'       => "mysql:host=localhost;dbname=eventsis",
        'dbuser'    => minutum($shadow['u']),
        'dbpass'    => minutum($shadow['p'])
    );