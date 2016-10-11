<?php
    //$shadow = require_once 'shadow.php';

    return array(
        //
        // parâmetros gerais para a app
        'title'     => 'Eventos Asser',

        //
        // parâmetros gerais para o banco de dados
        'dbname'    => 'eventosa_1sem2016',
        'dsn'       => "mysql:host=localhost;dbname=eventosa_1sem2016",
        'dbuser'    => 'root',//minutum($shadow['u']),
        'dbpass'    => '123456'//minutum($shadow['p'])
    );