<?php
    //$shadow = require_once 'shadow.php';

    return array(
        //
        // par�metros gerais para a app
        'title'     => 'Eventos Asser',

        //
        // par�metros gerais para o banco de dados
        'dbname'    => 'eventosa_1sem2016',
        'dsn'       => "mysql:host=localhost;dbname=eventosa_1sem2016",
        'dbuser'    => 'root',//minutum($shadow['u']),
        'dbpass'    => '123456'//minutum($shadow['p'])
    );